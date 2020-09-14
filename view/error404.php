<?php ob_start() ?>

<h1>Oops! Page has not found!</h1>

<?php $content = ob_get_clean()?>
<?php include_once 'view/layout.php' ?>