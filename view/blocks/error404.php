<?php ob_start() ?>

<h1>Oops! Page has not found!</h1>

<?php 
echo "<h2>$path</h2>";
$content = ob_get_clean()?>
<?php include_once 'view/layout/layout.php' ?>