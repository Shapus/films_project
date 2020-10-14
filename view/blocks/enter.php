<?php 
    ob_start();
    View::viewEnterForm();
    $content = ob_get_clean();
    include 'view/layout/emptyLayout.php' 
?>