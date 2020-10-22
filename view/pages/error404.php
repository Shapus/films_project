<?php 
    $last_url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"./";
    ob_start(); 
?>

<h1>Oops! Page has not found!</h1>
<a class="back_btn" href="<?php echo $last_url?>">На предыдущую страницу</a>

<?php 
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>