<?php
if (isset($_SESSION['userId']))
	header('Location: login');
?>
<!DOCTYPE html> <html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale-1"> <title>Панель администратора</title>
	<link href="public/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/css/login.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<form class="form-singin" action="login" method="POST">
			<h3 class="form-singin-heading">Введите ваши данные</h3>
			<input type="text" name="email" class="form-control" placeholders="Email" autofocus>
			<input type="password" name="password" class="form-control" placeholder="Пароль">
			<button class="btn btn-lg btn-primary btn-block" type="submit" name= "btnLogin">Boйти</button>
			<p style="padding-top:lOpx;">
			<?php
				if (isset($_SESSION['errorstring'])){ 
				echo $_SESSION['errorstring']; 
				unset($_SESSION['errorstring']);
			}
			?>
			</p><p style="padding-top: 10px;"><a href="../">ВЕБ сайт</a></p>
		</form>
	</div>
</body>
</html>