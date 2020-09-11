<html>
<head>
<title>Панель управления</title>
<link href="public/css/bootstrap.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="public/styles.css" rel="stylesheet">
<link href="public/login.css" rel="stylesheet">
<link href="public/mystyle.css" rel="stylesheet">
<link href="public/css/font-awesome.min.css">

<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
<script type="text/javascript" src= "public/js/ajaxupload.3.5.js"></script>
</head>
<body>
	<div class="container">
		<?php
			{
		?>
		<div class="header clearfix">
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<?php 

				echo "<ul class='nav nav-pills pull-right'>
				<li role='button'>".$_SESSION['name']."
				<a href='logout' style='display: inline;'>Выйти<i class='fa fa-sing-out'></i></a></li></ul>";
				if(isset($_SESSION['status']) && $_SESSION['status']=="admin"){
					echo "<h4><a href='../' target=blank>ВЕБ сайт</a>";
					echo "&#187 <a href='./'>Главная	</a>";
					echo "&#187 <a href='categoryAdmin'>Категории</a>";
					echo "&#187 <a href='newsAdmin'>Список новостей</a>";
					echo "</h4>";
					echo $_SESSION['status'];
				}
				else
					echo "<h4>Недостаточно прав!</h4>";

			 ?>
		</div>
		</nav>
		</div>
		<?php
			}
		?>
		<div id="content" style="padding-top:20px; ">
			<?php echo $content ?>
		</div>
		<footer class="footer">
			<p>&copy; JKTVR19 2020<i class="fa fa-child"></i></p>
		</footer>
	</div>
</body>
</html>