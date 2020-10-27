<?php

session_start();
require '../inc/Database.php';
require 'modelAdmin/Model.php';

include_once 'controllerAdmin/Controller.php';
include_once 'routeAdmin/routing.php';

echo $response;
?>