<?php

session_start();
include_once 'inc/Database.php';
require 'model/Videoplayer.php';
require 'model/Item.php';
require 'model/Serial.php';
require 'model/Category.php';
require 'model/Registration.php';
require 'model/User.php';
require 'model/Comment.php';

include_once 'view/View.php';
include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;

?>