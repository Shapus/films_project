<?php 
    ob_start();
    View::viewRegistrationForm();
    $registration_content = ob_get_clean();
    include_once 'view/layout.php';
?>