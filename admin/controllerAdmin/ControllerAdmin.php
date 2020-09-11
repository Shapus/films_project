<?php

class ControllerAdmin{
	public static function formLoginSite(){
		include_once('viewAdmin/templates/formLogin.php');
	}

	public static function loginAction(){
		$logIn = ModelAdmin::userAuthentication();
		if($logIn)
			include_once('viewAdmin/templates/startAdmin.php');
		else{
			$_SESSION['errorstring'] = 'Неверные логин и/или пароль';
			include_once('viewAdmin/templates/formLogin.php');
		}
	}

	public static function logoutAction(){
		modelAdmin::userLogout();
		include_once('viewAdmin/templates/formLogin.php');
	}

	public static function error404(){
		include_once('viewAdmin/templates/error404.php');
	}
}

?>