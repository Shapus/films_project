<?php ob_start() ?>

<h1>ERROR 404</h1>

<?php $content = ob_get_clean()?>
<?php include_once 'viewAdmin/templates/layoutAdmin.php' ?>