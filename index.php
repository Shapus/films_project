<?php
session_start();
include_once 'inc/Database.php';
require 'model/Items.php';
require 'model/Category.php';

include_once 'view/class/View.php';
include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>