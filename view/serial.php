<?php 
    ob_start();
    View::viewSeasons($database_response);
    $content = ob_get_clean();
    include_once 'view/layout.php';
?>