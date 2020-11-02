<?php
class Controller{

//============================================================================== START SITE
	//start site
	public static function startSite(){
		$categories = Category::getAllCategories();	
		$films = Film::getAllFilms();
		$serials = Serial::getAllSerials();		
		Controller::link("Все", false, false, false);
		include_once "view/pages/films_and_serials.php";
	}





//============================================================================== FILMS & SERIALS
	//get films and serials
	public static function getItems($getFilms, $getSerials, $category_id){	
		$categories = Category::getAllCategories();
		if($getFilms){	
			$_SESSION['mainLink__name'] = "Фильмы";
			$HTMLtitle = "Фильмы";
			if($category_id != -1){
				$films = Film::getFilmsByCategory($category_id);		
			}
			else{
				$films = Film::getAllFilms();
			}
			Controller::link("Фильмы", false, false, false);
		}
		if($getSerials){
			$_SESSION['mainLink__name'] = "Сериалы";
			$HTMLtitle = "Сериалы";
			if($category_id != -1){
				$serials = Serial::getSerialsByCategory($category_id);		
			}
			else{
				$serials = Serial::getAllSerials();
			}
			Controller::link("Сериалы", false, false, false);
			
		}
		if($getFilms and $getSerials){
			$HTMLtitle = "Все";
			Controller::link("Все", false, false, false);
		}
		include_once "view/pages/films_and_serials.php";
	}





//============================================================================== SERIAL
	//seasons in serial
	public static function getSeasonsBySerialId($id){	
		$seasons = Serial::getSeasonsBySerialId($id);
		$HTMLtitle = Serial::getSerialName($id);
		if(!$seasons){
			header("Location: error404");
		}
		Controller::link(false, Serial::getSerialName($id), false, false);
		include_once "view/pages/seasons.php";
	}
	
	//serias in season
	public static function getSeriasBySeason($season_id){
		$serias = Serial::getSeriasBySeason($season_id);
		if(!$serias){
			header("Location: error404");
		}
		$HTMLtitle = Serial::getSerialName($_GET['id']);
		Controller::link(false, Serial::getSerialName($_GET['id']), Serial::getSeasonName($season_id), false);
		include_once "view/pages/serias.php";
	}





//============================================================================== VIDEOPLAYER
	//get videoplayer
	public static function getVideoplayer($item_id){
		$videoplayer = Videoplayer::getVideoplayer($item_id);
		$_SESSION['videoLink__name'] = $videoplayer['title'];
		$HTMLtitle = Film::getFilmName($_GET['id']);
		Controller::link(false, false, false, $videoplayer['title']);
		if(!$videoplayer){
			header("Location: error404");
		}
		if(isset($_GET['id']) and isset($_GET['season'])){
			$season_id = Serial::getSeasonId($_GET['id'], $_GET['season']);
			$seriasCount = Serial::getSeriasCount($season_id);
			$HTMLtitle = Serial::getSerialName($_GET['id']);
			Controller::link(false, Serial::getSerialName($_GET['id']), Serial::getSeasonName($season_id), "Серия {$videoplayer['number']}");
		}
		$comments = Comment::getComments($videoplayer['id']);		
		include_once "view/pages/videoplayer.php";
	}





//============================================================================== REGISTRATION
	//registration
	public static function registration(){
		include_once "view/pages/registration.php";
	}

	//registration answer
	public static function registrationAnswer(){
		$control = Registration::registrationUser();
		include_once "view/pages/registrationAnswer.php";
	}





//============================================================================== ENTER
	//enter
	public static function enter(){
		include_once "view/pages/enter.php";
	}

	//enter answer
	public static function enterAnswer($email, $password){
		$_SESSION['user'] = null;
		$getPass = User::getPasswordHash($email);
		if($getPass){
			$passwordHash = $getPass['password'];
			if(password_verify($password, $passwordHash)){
				$_SESSION['user'] = User::getUser($email);
				$_SESSION['favorites'] = User::getFavorites($email);

			}
		}
		include_once "view/pages/enterAnswer.php";
	}





//============================================================================== FAVORITE
	//add favorite
	public static function addFavorite($id, $type){
		if(isset($_SESSION['user'])){
			User::addFavorite($id, $type);
			$_SESSION['favorites'] = User::getFavorites();
		}
	}

	//delete favorite
	public static function deleteFavorite($id, $type){
		if(isset($_SESSION['user'])){
			User::deleteFavorite($id, $type);
			$_SESSION['favorites'] = User::getFavorites();
		}
	}






//============================================================================== COMMENTS
	//insert comment
	public static function insertComment($videoplayer_id, $comment_text){
		if(!empty($comment_text)){
			Comment::insertComment($videoplayer_id, $comment_text);
		}
	}

	//hide comment
	public static function hideComment($comment_id){
		Comment::hideComment($comment_id);
	}

	//show comment
	public static function showComment($comment_id){
		Comment::showComment($comment_id);
	}





//============================================================================== ERROR 404
	//page not found
	public static function error404(){
		include_once "view/pages/error404.php";
	}





//============================================================================== HEADER LINKS
	//set header links
	public static function link($main, $serial, $season, $video){

		//main
		if($main){
			$_SESSION['mainLink'] = $_SERVER['REQUEST_URI'];
		}

		//serial
		if($serial){
			if(isset($_GET['id'])){
				$_SESSION['serialLink'] = "serials?id={$_GET['id']}";
				$_SESSION['serialLink__name'] = $serial;
				unset($_SESSION['seasonLink']);
				unset($_SESSION['seriaLink']);
			}			
		}
		else{
			unset($_SESSION['serialLink']);	
			unset($_SESSION['seasonLink']);
			unset($_SESSION['seriaLink']);	
		}

		//season
		if($season and isset($_GET['id']) and isset($_GET['season'])){
			$_SESSION['seasonLink'] = "serials?id={$_GET['id']}&season={$_GET['season']}";
			$_SESSION['seasonLink__name'] = $season;
			unset($_SESSION['seriaLink']);
		}
		else{
			unset($_SESSION['seasonLink']);
			unset($_SESSION['seriaLink']);
		}

		//videoplayer
		if($video){
			$_SESSION['videoLink'] = $_SERVER['REQUEST_URI'];
			$_SESSION['videoLink__name'] = $video;
			if(!isset($_GET['seria'])){
				unset($_SESSION['seriaLink']);
			}
		}
		else{
			unset($_SESSION['videoLink']);
			unset($_SESSION['seriaLink']);
		}
	}
}
?>