<?php ob_start(); ?>

<div class="container" style="min-height :400px;">
<div clas3="col-md-ll">
<h2>News Edit </h2>
<?php
	if(isset($test)){ 
		if($test==true){
?>
<div class="alert alert-info">
<strong>Запись изменена</strong><a href="newsAdmin">Список новостей</a>
</div>
<?php
		}
		else if($test==false){
?>
<div class="alert alert-warning">
<strong>Ошибка изменения записи!</strong>
<a href="newsAdmin">Список новостей</a>
</div>
<?php
		}
	}
	else{
?>
<form method="POST" action="newsEditResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
<table class='table table-bordered'>
	<tr>
		<td>News title</td>
		<td><input type='text' name="title" class="form-control" required value=<?php echo $detail['title']; ?>></td>
	</tr>
	<tr>
		<td>New» text</td>
		<td><textarea rows="5" name="text" class="form-control" required ><?php echo $detail['text']; ?></textarea></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><select name="categoryId" class="form-control">
		<?php
		foreach($array as $row){
			echo "<option value='".$row['id']."'";
			if($row['id'] == $detail['category_id']) echo "selected"; 
			echo ">".$row['id'].". ".$row['category_name']."</option>";
		}
?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Old picture</td>
		<td><div>
		<?php 
			echo "<img src='data:image/jpeg;base64, ".base64_encode($detail['image'])."' width=150 />";
		?>
		</div></td>
	</tr>
	<tr>
		<td>New picture</td>
		<td><div><input type="file" name="picture" style="color:black;">
		</div></td>
	</tr>
	<tr>
		<td colspan="2">
		<button type="submit" class="btn btn-primary" name="save">
		<span class="glyphicon glyphicon-plus"></span>Изменить</button>
		<a href="newsAdmin" class="btn btn-large btn-success">
		<i class="glyphicon glyphicon-backward"></i> &nbsp;К списку новостей</i>
		</td>
	</tr>
</table>
</form>
<?php
	}
?>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layoutAdmin.php"; ?>