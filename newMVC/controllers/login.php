<?php

Class Login extends Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
        
        $this->view->render('login/index'); // add (#,1) o disable #header and #footer
    }
    
    function run()
    {
        if (isset($_POST['submit'])){
            $this->model->run();
        }
        if (isset($_POST['register'])){
            $this->model->register();
        }
    }
}