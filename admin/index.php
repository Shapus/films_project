<?php

session_start();
require '../inc/Database.php';
require 'modelAdmin/ModelAdmin.php';
require 'modelAdmin/ModelAdminNews.php';
require 'modelAdmin/ModelAdminCategory.php';

include_once 'controllerAdmin/ControllerAdmin.php';
include_once 'controllerAdmin/ControllerAdminNews.php';
include_once 'routeAdmin/routingAdmin.php';

echo $response;
?>