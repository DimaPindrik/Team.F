<?php

class wikipedia extends Controller {

    function __construct() {
        parent::__construct();
    }
    function index()
    {
        $this->view->render('wikipedia/index'); // add (#,1) o disable #header and #footer
    }
}

