<?php
	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];

	if($path == "" or $path == "index" or $path == "index.php"){
		$response = Controller::startSite();
	}
	elseif ($path == "dashboard") {
		$response = Controller::dashbord();
	}
?>