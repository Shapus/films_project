<?php
class Controller{

//============================================================================== START SITE
	//start site
	public static function startSite(){
		$categories = Category::getAllCategories();	
		$films = Film::getAllFilms();
		$serials = Serial::getAllSerials();		
		include_once "view/pages/films_and_serials.php";
	}





//============================================================================== FILMS & SERIALS
	//get films and serials
	public static function getItems($getFilms, $getSerials, $category_id){	
		$categories = Category::getAllCategories();
		if($getFilms){	
			if($category_id != -1){
				$films = Film::getFilmsByCategory($category_id);		
			}
			else{
				$films = Film::getAllFilms();
			}
		}
		if($getSerials){
			if($category_id != -1){
				$serials = Serial::getSerialsByCategory($category_id);		
			}
			else{
				$serials = Serial::getAllSerials();
			}
			
		}
		include_once "view/pages/films_and_serials.php";
	}





//============================================================================== SERIAL
	//seasons in serial
	public static function getSeasonsBySerialId($id){	
		$seasons = Serial::getSeasonsBySerialId($id);
		include_once "view/pages/seasons.php";
	}
	
	//serias in season
	public static function getSeriasBySeason($season_id){
		$serias = Serial::getSeriasBySeason($season_id);
		include_once "view/pages/serias.php";
	}





//============================================================================== VIDEOPLAYER
	//get videoplayer
	public static function getVideoplayer($item_id){
		$videoplayer = Videoplayer::getVideoplayer($item_id);
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
	public static function error404($str){
		$path = $str;
		include_once "view/pages/error404.php";
	}
}
?>