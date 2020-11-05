<?php 
    ob_start();
    View::itemRow('Серии', $serias);
    $type = isset($_GET['type'])?$_GET['type']:0;
    $category = isset($_GET['category'])?"&category={$_GET['category']}":"";
    $link = "items?type={$type}{$category}";
    echo "<a class=\"back_btn\" href=\"{$link}&id={$_GET['id']}\">К списку сезонов</a>"; 
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
