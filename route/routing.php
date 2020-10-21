<?php
	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];

	//index
	if($num == 2 and ($path == "" or $path == "index" or $path == "index.php")){
		$response = Controller::startSite();
	}
		
	//items
	elseif($path == 'items'){
		if(isset($_GET['category'])) $response = Controller::getItemsByCategory($_GET['category']);
		elseif(isset($_GET['id'])) $response = Controller::getItemById($_GET['id']);
		else $response = Controller::getAllItems();
	}
	
		

	//serials
	elseif($path == 'serials'){
		if(isset($_GET['category'])) $response = Controller::getSerialsByCategory($_GET['category']);
		elseif(isset($_GET['id']) and isset($_GET['season']) and isset($_GET['seria'])) $response = Controller::getSeria($_GET['id'], $_GET['season'], $_GET['seria']);
		elseif(isset($_GET['id']) and isset($_GET['season'])) $response = Controller::getSeriasBySerialSeason($_GET['id'], $_GET['season']);
		elseif(isset($_GET['id'])) $response = Controller::getSeasonsBySerialId($_GET['id']);
		else $response = Controller::getAllSerials();
	}


	//films
	elseif($path == 'films'){
		if(isset($_GET['category'])) $response = Controller::getFilmsByCategory($_GET['category']);
		elseif(isset($_GET['id'])) $response = Controller::getFilmById($_GET['id']);
		else $response = Controller::getAllFilms();
	}
	

	//registration&entring
	elseif($path == 'registration'){
		$response = Controller::registration();
	}
	elseif ($path == 'registrationAnswer') {
		if(isset($_POST['submit']))
			$response = Controller::registrationAnswer();
		else
			header("Location: registration");
	}
	elseif($path == 'enter'){
		$response = Controller::enter();
	}
	elseif($path == 'enterAnswer'){
		if(isset($_POST['submit']))
			$response = Controller::enterAnswer($_POST['email'], $_POST['password']);
		else
			header("Location: enter");
	}
	elseif($path == 'logout'){
		unset($_SESSION['user']);
		unset($_SESSION['favorites']);
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}
	
	//favorites
	elseif($path == "addFavorite"){
		if(isset($_POST['id']) and isset($_POST['type']) and isset($_SESSION['user'])){
			Controller::addFavorite($_POST['id'], $_POST['type']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}
	elseif($path == "deleteFavorite"){
		if(isset($_POST['id']) and isset($_POST['type']) and isset($_SESSION['user'])){
			Controller::deleteFavorite($_POST['id'], $_POST['type']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}

	//error
	else{
		$response = Controller::error404($_SERVER['REQUEST_URI']);
	}
?>