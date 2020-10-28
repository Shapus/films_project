<?php

	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];

//============================================================================== START SITE
	if($num > 2){
		$response = Controller::error404();
	}
	//index
	else if(($path == "" or $path == "index" or $path == "index.php")){

		$_SESSION['mainLink'] = $_SERVER['REQUEST_URI'];
		unset($_SESSION['filmLink']);
		unset($_SESSION['serialLink']);
		unset($_SESSION['seasonLink']);		
		unset($_SESSION['seriaLink']);

		$response = Controller::startSite();
	}





//============================================================================== FILMS & SERIALS
	//all items
	elseif($path == 'items'){
		Controller::link(true, false, false, false);		

		if(isset($_GET['category'])){
			$response = Controller::getItems(true, true, $_GET['category']);
		}
		else{
			$response = Controller::getItems(true, true, -1);
		}
	}

	//serials
	elseif($path == 'serials' && !isset($_GET['id'])){
		Controller::link(true, false, false, false);	

		if(isset($_GET['category'])){
			$response = Controller::getItems(false, true, $_GET['category']);
		}
		else{
			$response = Controller::getItems(false, true, -1);
		}
	}

	//films
	elseif($path == 'films' && !isset($_GET['id'])){
		Controller::link(true, false, false, false);	

		if(isset($_GET['category'])){
			$response = Controller::getItems(true, false, $_GET['category']);
		}

		else{
			$response = Controller::getItems(true, false, -1);
		}
	}





//============================================================================== SERIAL
	elseif($path == 'serials' && isset($_GET['id']) and !isset($_GET['seria'])){
		Controller::link(false, true, false, false);	

		if(isset($_GET['season'])){
			$season_id = Serial::getSeasonId($_GET['id'], $_GET['season']);

			Controller::link(false, true, true, false);	

			$response = Controller::getSeriasBySeason($season_id);
		}
		else{
			$response = Controller::getSeasonsBySerialId($_GET['id']);
		}
	}





//============================================================================== VIDEOPLAYER
	//seria videoplayer
	elseif($path == 'serials' and isset($_GET['id']) and isset($_GET['season']) and isset($_GET['seria'])){
		$season_id = Serial::getSeasonId($_GET['id'], $_GET['season']);
		$seria_id = Serial::getSeriaId($season_id, $_GET['seria']);

		Controller::link(false, true, true, true);	

		$response = Controller::getVideoplayer($seria_id);
	}

	//film videoplayer
	elseif($path == 'films' and isset($_GET['id'])){
		
		Controller::link(false, false, false, true);

		$response = Controller::getVideoplayer($_GET['id']);
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