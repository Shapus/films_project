<?php 
    ob_start(); 
?>

<h1>Oops! Page has not found!</h1>
<a class="back_btn" href="./">На главную страницу</a>

<?php 
    $content = ob_get_clean();
    include_once 'viewAdmin/layout/emptyLayout.php';
?>