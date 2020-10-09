<?php 
    ob_start();
    View::viewEnterForm();
    $registration_content = ob_get_clean();
?>
