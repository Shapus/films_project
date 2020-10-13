<?php 
    ob_start();
    View::viewRegistrationForm(array("","","",""));
    $content = ob_get_clean();
    include_once 'view/layout/emptyLayout.php';
?>