<?php 
    ob_start();
    View::itemRow("Сезоны", $seasons, $item);
    $type = isset($_GET['type'])?"type={$_GET['type']}&":"";
    $category = isset($_GET['category'])?"category={$_GET['category']}":"";
    $link = "items?type={$type}{$category}";
    echo "<a class=\"back_btn\" href=\"{$link}\">На главную</a>";
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
