<?php 
    ob_start();
    View::viewSeria($database_response);
    $content = ob_get_clean();
    include_once 'view/layout.php';
?>