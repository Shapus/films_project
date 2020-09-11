<?php ob_start() ?>

<article>
	<div id="main" class="container">
		<h3>Панель управления</h3>
		<div class="row">
			<p>Панель управления</p>
		</div>
	</div>
</article>

<?php $content = ob_get_clean()?>
<?php include_once 'viewAdmin/templates/layoutAdmin.php' ?>