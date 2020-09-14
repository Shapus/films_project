<?php 
    ob_start();
    View::viewItem($database_response);
    $content = ob_get_clean();
    include_once 'view/layout.php';
?>
