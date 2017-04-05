<?php

Class Homepage extends Controller{
    
    function __construct(){
        parent::__construct();
    }
    function index()
    {
        $this->view->render('homepage/index'); // add (#,1) o disable #header and #footer
    }
}