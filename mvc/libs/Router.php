<?php

class Router {
    
    private $uri;
    private $controller;
    
	public function __construct() {
            
            $this->getURI();
		
            $this->initController();
        
            $this->controller->loadModel($this->controllerName);
            
            $this->initAction();
		
	}
	
    private function getURI() 
        {
            $this->uri = $_SERVER['REQUEST_URI'];
            $this->uri = trim(preg_replace("/newMVC/", "", $this->uri),'/'); // XAMPP modification
            $this->uri = explode('/', $this->uri);
        }
        
    private function initController()
    {   
        $this->controllerName = array_shift($this->uri);
        $this->controllerAction = array_shift($this->uri);
        $this->controllerParams = $this->uri;
        
//        echo 'CTRname:'.$this->controllerName .'<br>'.'CTRaction:'.$this->controllerAction.'<br>';
//        print_r($this->controllerParams);
        
        if (empty($this->controllerName)) {
			require 'controllers/homepage.php';
			$this->controller = new Homepage();
                        return false;
		}
        $file = 'controllers/' . $this->controllerName . '.php';
		if (file_exists($file)) {
			require $file;
                        $this->controller = new $this->controllerName;
		} else {
                    require_once 'controllers/error.php';
                        $this->controller = new cError();                      
		}
    }
    
    private function initAction()
    {   
        if ($this->controllerAction)
        {
            if (method_exists($this->controller, $this->controllerAction))
            {
                call_user_func_array(array($this->controller, $this->controllerAction), $this->controllerParams);
            } else {
                $this->error();
            }
        }
        else {
            $this->controller->index();
        }
        
    }
 
    function error() {
        
        if (!$this->controller instanceof cError){
            require_once 'controllers/error.php';
            $this->controller = new cError();
        }
        
	$this->controller->index();
	return false;
    }

}
