<?php 
    ob_start();
    $control = Registration::registrationUser();
    View::viewRegistrationAnswer($control);
    $content = ob_get_clean();
    include 'view/layout/emptyLayout.php' 
?>