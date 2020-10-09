<?php 
    if(!isset($database_response_films)) $database_response_films = null;
    if(!isset($database_response_serials)) $database_response_serials = null;
    ob_start();
    View::viewFilter($categories);
    View::viewItems($database_response_films, $database_response_serials, $categories);
    $content = ob_get_clean();
    
    ob_start();
    include_once 'view/layout/layout.php';
?>