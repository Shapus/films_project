<?php

session_start();
require '../inc/Database.php';
require 'modelAdmin/Comment.php';
require 'modelAdmin/Enter.php';
require 'modelAdmin/Item.php';
require 'modelAdmin/Video.php';

include_once 'controllerAdmin/Controller.php';
include_once 'routeAdmin/routing.php';

echo $response;
?>