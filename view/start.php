<?php 
    ob_start();
    View::viewFilter($categories);
    View::viewItems($database_response, $categories);
    View::viewPagesNumbers($database_response);
    $content = ob_get_clean();
    
    ob_start();
    View::viewEnterForm();
    $registration_content = ob_get_clean();
    include_once 'view/layout.php';
?>