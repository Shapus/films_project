<?php ob_start(); ?>

<div class="container" style="min-height:400px">
	<div class="col-md-11">
		<h2>Add News</h2>
		<?php
			if(isset($test)){ 
				if($test==true){
		?>
		<div class="alert alert-info">
			<strong>Запись добавлена	</strong><a href="newsAdmin">	Список новостей</a>
		</div>
		<?php
			} #---if($test==true)
			else if($test==false){
		?>
		<div class="alert alert-warning">
			<strong>Ошибка добавления записи!</strong> <a href="newsAdmin">Список новостей</a>
		</div>
		<?php 
			} #---else if($test==false)
		} #---if isset($test)
else{
	?>
	<form method='POST' action="newsAddResult" enctype="multipart/form-data">
	<table class="table table-bordered">
		<tr>
			<td>News title</td>
			<td><input type="text" name="title" class="form-control" required></td>
		</tr>
		<tr>
			<td>News text</td>
			<td><textarea rows="5" name="text" class="form-control" required> </textarea></td> 
		</tr>
		<tr>
			<td>Category</td>
			<td><select name="categoryId" class="form-control">
			<?php
			foreach($categoryArray as $category){
				echo "<option value='".$category['id']."'>".$category['id'].". ".$category['category_name']."</option>";
			}
			?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Picture</td>
			<td><div><input type=file name="picture" style="color:black;">
			</div></td>
		</tr>
		<tr>
			<td colspan="2">
			<button type="submit" class="btn btn-primary" name="save">
			<span class="glyphicon glyphicon-plus"></span>Сохранить</button>
			<a href="newsAdmin" class="btn btn-large btn-success">
			<i class="glyphicon glyphicon-backward"></i> &nbsp;К списку новостей</a></td>
		</tr>
	</table>
	</form>
	<?php } ?>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('viewAdmin/templates/layoutAdmin.php'); ?>