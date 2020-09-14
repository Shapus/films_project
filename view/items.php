<?php 
    ob_start();
    View::viewItems($database_response);
    $content = ob_get_clean();
    include_once 'view/layout.php';
?>
