<?php

session_start();
$_SESSION['project_name'] = "films_project";
include_once 'inc/Database.php';
require 'model/Item.php';
require 'model/Film.php';
require 'model/Serial.php';
require 'model/Category.php';
require 'model/Registration.php';

include_once 'view/View.php';
include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;

?>