<?php 
    ob_start();
    echo count($database_response);
    View::viewSerias($database_response);
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>