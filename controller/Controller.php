<?php
$_SESSION['categories'] = Category::getAll();
class Controller{

//============================================================================== START SITE
	//start site
	public static function startSite(){
		Controller::getItems(0, null);
		include_once "view/pages/films_and_serials.php";
	}





//============================================================================== ITEMS
	//get films and serials
	public static function getItems($type, $category_id){	
		switch ($type) {
			case 0:
				$films = Item::getAll(1, $category_id);
				$serials = Item::getAll(2, $category_id);
				break;
			case 1:
				$films = Item::getAll($type, $category_id);
				$serials = null;
				break;		
			case 2:
				$films = null;
				$serials = Item::getAll($type, $category_id);
				break;
			default:
				break;
		}
		include_once "view/pages/films_and_serials.php";
	}

	public static function getItem($id){
		$item = Item::get($id);
		switch ($item['type']) {
			case 1:
				Controller::getVideoplayer($id);
				break;
			case 2:
				Controller::getSeasons($id);
				break;
		}
	}





//============================================================================== SERIAL
	//seasons in serial
	public static function getSeasons($serial_id){	
		$seasons = Serial::getSeasons($serial_id);
		include_once "view/pages/seasons.php";
	}
	
	//serias in season
	public static function getSerias($serial_id, $season_number){
		$season_id = Serial::getSeasonId($serial_id, $season_number);
		$serias = Serial::getSerias($season_id);
		include_once "view/pages/serias.php";
	}





//============================================================================== VIDEOPLAYER
	//get videoplayer
	public static function getVideoplayer($item_id){
		if(isset($_GET['seria'])){
			$season_id = Serial::getSeasonId($item_id, $_GET['season']);
			$id = Serial::getSeriaId($season_id, $_GET['seria']);
		}
		else{
			$id = $item_id;
		}
		$videoplayer = Videoplayer::getVideoplayer($id);
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





//============================================================================== NAVIGATION LINKS
	//set navigation links
	public static function link($category, $id, $season, $seria){
		$link = "items?type={$_GET['type']}";
		if(!is_null($category)){
			$link .= "&category={$category}";
		}
		if(!is_null($id)){
			$link .= "&id={$id}";
		}
		if(!is_null($season)){
			$link .= "&season={$season}";
		}
		if(!is_null($seria)){
			$link .= "&seria={$seria}";
		}
	}
}
?>