<?php

define('URL','http://localhost:85/newMVC/');
define('ROOT',dirname(__FILE__));

//Components
require 'libs/Router.php';
require 'libs/Database.php';


//Library
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Session.php';

//config
require 'config/database.php';

$app = new Router();

?>