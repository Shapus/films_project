<?php 
    ob_start();
    View::viewFilm($database_response);
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
