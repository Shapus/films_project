<?php

session_start();
require '../inc/Database.php';
require 'modelAdmin/Category.php';
require 'modelAdmin/Comment.php';
require 'modelAdmin/Enter.php';
require 'modelAdmin/Item.php';
require 'modelAdmin/Video.php';
require 'viewAdmin/View.php';

include_once 'controllerAdmin/Controller.php';
include_once 'routeAdmin/routing.php';

echo $response;
?>