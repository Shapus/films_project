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

	public static function getItem($id, $type){
		$item = Item::get($id);
		if($type == 0){
			$type = Item::getType($id)['type'];
		}
		switch ($type) {
			case 1:
				Controller::getVideoplayer($id, $type);
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
		if(!$seasons){
			include_once "view/pages/error404.php";
			return;
		}
		include_once "view/pages/seasons.php";
	}
	
	//serias in season
	public static function getSerias($serial_id, $season_number){
		$season_id = Serial::getSeasonId($serial_id, $season_number);
		$serias = Serial::getSerias($season_id);
		if(!$serias){
			include_once "view/pages/error404.php";
			return;
		}
		include_once "view/pages/serias.php";
	}





//============================================================================== VIDEOPLAYER
	//get videoplayer
	public static function getVideoplayer($item_id, $type){
		if($type == 0){
			$type = Item::getType($item_id)['type'];
		}
		switch ($type) {
			case 1:
				$seriasCount['count'] = 1;
				$id = $item_id;
				break;
			case 2:
				$season_id = Serial::getSeasonId($item_id, $_GET['season']);
				$id = Serial::getSeriaId($season_id, $_GET['seria']);
				$seriasCount = Serial::getSeriasCount($season_id);
				break;
			default:
				$id = null;
				$type = null;
		}

		$videoplayer = Videoplayer::getVideoplayer($id, $type);
		if(!$videoplayer){
			include_once "view/pages/error404.php";
		}
		else{
			$comments = Comment::getComments($videoplayer['id']);		
			include_once "view/pages/videoplayer.php";
		}
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
				$_SESSION['favorites'] = User::getFavorites($_SESSION['user']['id']);

			}
		}
		include_once "view/pages/enterAnswer.php";
	}





//============================================================================== FAVORITE
	//view favorites
	public static function favorites($type){
		$user_id = isset($_SESSION['user'])?$_SESSION['user']['id']:null;
		$favorites = User::getFavorites($_SESSION['user']['id']);
		switch ($type) {
			case 0:
				$films = array();
				$serials = array();
				$seasons = array();
				$serias = array();
				break;
			case 1:
				$films = array();
				$serials = null;
				$seasons = null;
				$serias = null;
				break;
			case 2:
				$films = null;
				$serials = array();
				$seasons = null;
				$serias = null;
				break;
			case 3:
				$films = null;
				$serials = null;
				$seasons = array();
				$serias = null;
				break;
			case 4:
				$films = null;
				$serials = null;
				$seasons = null;
				$serias = array();
				break;
			default:
				include_once "view/pages/error404.php";
				return;
		}
		$favorites_item = User::getFavoriteItems($favorites);
		foreach ($favorites_item as $favorite) {
			switch ($favorite['type']) {
				case 1:
					if(!is_null($films)){
						array_push($films, $favorite);
					}
					break;
				case 2:
					if(!is_null($serials)){
						array_push($serials, $favorite);
					}
					break;
				case 3:
					if(!is_null($seasons)){
						array_push($seasons, $favorite);
					}
					break;
				case 4:
					if(!is_null($serias)){
						array_push($serias, $favorite);
					}
					break;
			}
		}
		include_once "view/pages/favorites.php";
	}

	//add favorite
	public static function addFavorite($id, $type){
		if(isset($_SESSION['user'])){
			User::addFavorite($id, $type);
			$_SESSION['favorites'] = User::getFavorites($_SESSION['user']['id']);
		}
	}

	//delete favorite
	public static function deleteFavorite($id, $type){
		if(isset($_SESSION['user'])){
			User::deleteFavorite($id, $type);
			$_SESSION['favorites'] = User::getFavorites($_SESSION['user']['id']);
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
		$type = isset($_GET['type'])?$_GET['type']:0;
		$link = "items?type={$type}";
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