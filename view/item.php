<?php 
    ob_start();
    View::viewFilm($database_response);
    print_r($database_response);
    $content = ob_get_clean();
    include_once 'view/layout.php';
?>
