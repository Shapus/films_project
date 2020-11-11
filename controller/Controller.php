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
				$films = Item::getByCategory(1, $category_id);
				$serials = Item::getByCategory(2, $category_id);
				break;
			case 1:
				$films = Item::getByCategory($type, $category_id);
				$serials = null;
				break;		
			case 2:
				$films = null;
				$serials = Item::getByCategory($type, $category_id);
				break;
			default:
				break;
		}
		include_once "view/pages/films_and_serials.php";
	}

	public static function getItem($item_id){
		$item = Item::getItem($item_id);
		$_SESSION['item_name'] = $item['title'];
		switch ($item['type']) {
			case 1:
				$element = Item::getFilm($item_id);
				$videoplayer = Item::getFilmPlayer($element['id']);
				$seriasCount = 0;
				if(!$videoplayer){
					include_once "view/pages/error404.php";
				}
				else{
					$comments = Comment::getComments($videoplayer['id']);		
					include_once "view/pages/videoplayer.php";
				}
				break;
			case 2:
				$seasons = Item::getSeasons($item_id);
				include_once "view/pages/seasons.php";
				break;
		}
	}

	public static function getSeason($item_id, $seasonNumber){
		$serial = Item::getSerial($item_id);
		$serias= Item::getSerias($item_id, $seasonNumber);
		$_SESSION['season_name'] = "Сезон {$seasonNumber}";
		if(!$serias){
			include_once "view/pages/error404.php";
		}
		else{
			include_once "view/pages/serias.php";
		}
	}
	public static function getSeria($item_id, $seasonNumber, $seriaNumber){
		$item = Item::getItem($item_id);
		$element = Item::getSeria($item_id, $seasonNumber, $seriaNumber);
		$seriasCount = Item::seriasCount($item_id);
		$videoplayer= Item::getSeriaPlayer($item_id, $seasonNumber, $seriaNumber);
		$_SESSION['seria_name'] = "Серия {$seriaNumber}";
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
		$ids = array();
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
						if(!in_array($favorite['item_id'], $ids)){
							array_push($ids, $favorite['item_id']);
						};
						array_push($seasons,$favorite);
					}
					break;
				case 4:
					if(!is_null($serias)){
						if(!in_array($favorite['item_id'], $ids)){
							array_push($ids, $favorite['item_id']);
						};
						array_push($serias,$favorite);
					}
					break;
			}
		}
		$parents = Item::getParents($ids);
		include_once "view/pages/favorites.php";
	}

	//add favorite
	public static function addFavorite($id){
		User::addFavorite($id);
		$_SESSION['favorites'] = User::getFavorites($_SESSION['user']['id']);
	}

	//delete favorite
	public static function deleteFavorite($id){
		User::deleteFavorite($id);
		$_SESSION['favorites'] = User::getFavorites($_SESSION['user']['id']);
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