<?php 
    ob_start();
    View::viewFilter($categories);
    View::viewItems($database_response, $type);
    View::viewPagesNumbers($database_response);
    $content = ob_get_clean();
    include_once 'view/layout.php';
?>
