<?php
    ob_start();
    View::adminItemRow($items);
    $content = ob_get_clean();
    include_once 'viewAdmin/layout/layout.php';
?>