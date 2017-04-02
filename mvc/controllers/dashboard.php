<?php

//require_once ROOT . '/models/widget_model.php';

Class Dashboard extends Controller{
    
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false){
            Session::destroy();
            header('Location:'.URL.'login');
            exit;
        }
    }
    
    function index($widgetId = null)
    {   
  //      $widgetList = array();
  //      $widgetList = Widget_Model::getWidgetList();
        
        $this->view->render('dashboard/index'); // add (#,1) o disable #header and #footer
        return true;
    }
    
    function logout()
    {
        Session::destroy();
        header('Location:'.URL.'login');
        exit;
    }
    
    
}