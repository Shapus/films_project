<?php
	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];

	if($path == "" or $path == "index" or $path == "index.php"){
		$response = Controller::enter();
	}
	elseif ($path == "dashboard") {
		if(isset($_SESSION['user']) and !is_null($_SESSION['user']) and $_SESSION['user']['status'] == 2){
			$response = Controller::dashbord();
		}
		else{
			$response = Controller::error404();
		}
	}

	elseif($path == "enter"){
		$response = Controller::enter();
	}
	elseif($path == "enterAnswer"){
		$response = Controller::enterAnswer();
	}
?>