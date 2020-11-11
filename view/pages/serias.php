<?php 
    ob_start();
    View::itemRow('Серии', $serias, $serial);
    $type = isset($_GET['type'])?"type={$_GET['type']}&":0;
    $category = isset($_GET['category'])?"category={$_GET['category']}&":"";
    $id = "id={$_GET['id']}";
    $link = "items?{$type}{$category}{$id}";
    echo "<a class=\"back_btn\" href=\"{$link}\">К списку сезонов</a>"; 
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
