<?php ob_start() ?>

<h2>Список новостей</h2>
<div class="container" style="min-height: 400px">
	<div style="margin: 20px">
		<a href="newsAdd" class="btn btn-primary" role="button">Добавить новость</a>
	</div>
	<div class="col-md-11">
		<table class="table table-border table-responsive">
			<tr>
				<th width="10%">Id</th>
				<th width="70%">Заголовок</th>
				<th width="20%"></th>
			</tr>
			<?php 

			foreach ($newsArray as $news) {
				echo "<tr>";
				echo "<td>".$news['id']."</td>";
				echo "<td><b>Заголовок: </b>".$news['title']."<br>";
				echo "<b>Категория: </b><i>".$news['category_name']."</i>";
				echo "<br><b>Автор: </b><i>".$news['name']."</i>";
				echo "</td>";
				echo "<td>
				<a href='newsEdit?id=".$news['id']."'>Редактировать<span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
				<a href='newsDelete?id=".$news['id']."'>Удалить<span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</div>
<?php $content = ob_get_clean() ?>
<?php include "viewAdmin/templates/layoutAdmin.php" ?>