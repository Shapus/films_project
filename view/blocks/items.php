<?php 
    if(!isset($database_response_films) || count($database_response_films) == 0) $database_response_films = null;
    if(!isset($database_response_serials) || count($database_response_serials) == 0) $database_response_serials = null;
    ob_start();
    View::viewFilter($categories);
    View::viewItems($database_response_films, $database_response_serials, $categories);
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
