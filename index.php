<?php
class Functions{
    public static  function getUrl(){
    }
}
session_start();
include_once 'inc/Database.php';
require 'model/Item.php';
require 'model/Film.php';
require 'model/Serial.php';
require 'model/Category.php';

include_once 'view/View.php';
include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;

?>