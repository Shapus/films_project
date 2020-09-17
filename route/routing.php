<?php

	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];
	if($num == 2 and ($path == "" or $path == "index" or $path == "index.php")){
		$response = Controller::startSite();
	}

	elseif($path == 'items'){
		$response = Controller::getAllItems();
	}

	elseif($path == 'item' and isset($_GET['id'])){
		$response = Controller::getItemById($_GET['id']);
	}

	elseif($path == 'serial' and isset($_GET['id'])){
		$response = Controller::getSeasonsBySerialId($_GET['id']);
	}	
	elseif($path == "season" and isset($_GET['id'])){
		$response = Controller::getItemsBySeasonId($_GET['id']);
	}
	else{
		$response = Controller::error404();
	}
?>