<?php

	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];

//============================================================================== START SITE
	if($num > 2){
		$response = Controller::error404();
	}
	//index
	elseif(($path == "" or $path == "index" or $path == "index.php")){
		Controller::link(true, false, false, false);
		$response = Controller::startSite();
	}





//============================================================================== ITEMS
	elseif($path == 'items'){
		$category = isset($_GET['category'])?$_GET['category']:null;
		$type = isset($_GET['type'])?$_GET['type']:0;
		if(isset($_GET['id']) and isset($_GET['season']) and isset($_GET['seria'])){
			$response = Controller::getVideoplayer($_GET['id'], $type);
		}
		elseif(isset($_GET['id']) and isset($_GET['season'])){
			$response = Controller::getSerias($_GET['id'], $_GET['season']);
		}
		elseif(isset($_GET['id'])){
			$response = Controller::getItem($_GET['id'], $type);
		}
		else{
			$response = Controller::getItems($type, $category);
		}
	}





//============================================================================== REGISTRATION
	//registration
	elseif($path == 'registration'){
		$response = Controller::registration();
	}
	//registration answer
	elseif ($path == 'registrationAnswer') {
		if(isset($_POST['submit']))
			$response = Controller::registrationAnswer();
		else
			header("Location: registration");
	}





//============================================================================== ENTER
	//enter
	elseif($path == 'enter'){
		$response = Controller::enter();
	}

	//enter answer
	elseif($path == 'enterAnswer'){
		if(isset($_POST['submit']))
			$response = Controller::enterAnswer($_POST['email'], $_POST['password']);
		else
			header("Location: enter");
	}

	//logout
	elseif($path == 'logout'){
		unset($_SESSION['user']);
		unset($_SESSION['favorites']);
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}





//============================================================================== FAVORITE
	elseif($path == "favorites"){
		$type = isset($_GET['type'])?$_GET['type']:0;
		$response = Controller::favorites($type);	
	}
	//add favorite
	elseif($path == "addFavorite"){
		if(isset($_POST['id']) and isset($_POST['type']) and isset($_SESSION['user'])){
			Controller::addFavorite($_POST['id'], $_POST['type']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
		
	}

	//delete favorite
	elseif($path == "deleteFavorite"){
		if(isset($_POST['id']) and isset($_POST['type']) and isset($_SESSION['user'])){
			Controller::deleteFavorite($_POST['id'], $_POST['type']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}





//============================================================================== COMMENTS
	//insert comments
	elseif($path == "insertComment"){
		if(isset($_POST['videoplayer_id']) and isset($_POST['comment_text']) and isset($_SESSION['user'])){
			Controller::insertComment($_POST['videoplayer_id'], $_POST['comment_text']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}

	//hideComment
	elseif($path == "hideComment"){
		if(isset($_POST['comment_id']) and isset($_SESSION['user'])){
			Controller::hideComment($_POST['comment_id']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}

	//showComment
	elseif($path == "showComment"){
		if(isset($_POST['comment_id']) and isset($_SESSION['user'])){
			Controller::showComment($_POST['comment_id']);
		}
		$link = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"./";
		header("Location: {$link}");
	}





//============================================================================== ERROR 404		
	//error
	else{
		$response = Controller::error404();
	}
?>