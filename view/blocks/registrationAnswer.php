<?php 
    ob_start();
    View::viewRegistrationAnswer($control);
    $content = ob_get_clean();
    include_once 'view/layout/emptyLayout.php' 
?>