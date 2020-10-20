<?php 
    ob_start();
    View::viewEnterAnswer();
    $content = ob_get_clean();
    include 'view/layout/emptyLayout.php' 
?>