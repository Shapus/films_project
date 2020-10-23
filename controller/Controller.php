<?php
class Controller{



	//items
	public static function getAllItems(){	
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getAllFilms();
		$database_response_serials = Serial::getAllSerials();
		include_once "view/pages/films_and_serials.php";
	}
	public static function getItemById($id){	
		$database_response = Item::getItemById($id);
		if($database_response['type'] == 'serial'){
			$database_response = Serial::getSerialById($id);
			include_once "view/pages/seasons.php";
		}
		elseif($database_response['type'] == 'film'){
			$database_response = Film::getItemById($id);
			$comments = Comment::getComments__item($id);
			include_once "view/pages/playerFilm.php";
		}
	}
	public static function getItemsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getFilmsByCategory($category_id);	
		$database_response_serials = Serial::getSerialsByCategory($category_id);
		include_once "view/pages/films_and_serials.php";		
	}



	//serials
	public static function getAllSerials(){
		$categories = Category::getAllCategories();	
		$database_response_serials = Serial::getAllSerials();		
		include_once "view/pages/films_and_serials.php";
	}
	public static function getSeasonsBySerialId($id){	
		$database_response = Serial::getSeasonsBySerialId($id);
		include_once "view/pages/seasons.php";
	}
	public static function getSerialsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response_serials = Serial::getSerialsByCategory($category_id);
		include_once "view/pages/films_and_serials.php";
	}
	public static function getSeriasBySerialSeason($serial_id, $season_number){
		$database_response = Serial::getSeriasBySerialSeason($serial_id, $season_number);
		include_once "view/pages/serias.php";
	}
	public static function getSeria($serial_id, $season_number, $seria_number){
		$database_response = Serial::getSeria($serial_id, $season_number, $seria_number);
		$comments = Comment::getComments__seria($seria_id);
		include_once "view/pages/playerSeria.php";
	}



	//films
	public static function getAllFilms(){
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getAllFilms();
		include_once "view/pages/films_and_serials.php";
	} 
	public static function getFilmById($id){
		$database_response = Film::getFilmById($id);	
		$comments = Comment::getComments__item($id);
		include_once "view/pages/playerFilm.php";
	} 
	public static function getFilmsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getFilmsByCategory($category_id);
		include_once "view/pages/films_and_serials.php";
	}

	//registration
	public static function registration(){
		include_once "view/pages/registration.php";
	}
	public static function registrationAnswer(){
		$control = Registration::registrationUser();
		include_once "view/pages/registrationAnswer.php";
	}

	//entring
	public static function enter(){
		include_once "view/pages/enter.php";
	}
	public static function enterAnswer($email, $password){
		$_SESSION['user'] = null;
		$passwordHash = User::getPasswordHash($email)['password'];
		if(password_verify($password, $passwordHash)){
			$_SESSION['user'] = User::getUser($email);
			$_SESSION['favorites__item'] = User::getFavorites__item($email);
			$_SESSION['favorites__season'] = User::getFavorites__season($email);
			$_SESSION['favorites__seria'] = User::getFavorites__seria($email);

		}
		include_once "view/pages/enterAnswer.php";
	}

	//favorite items
	public static function addFavorite__item($id){
		if(isset($_SESSION['user'])){
			User::addFavorite__item($id);
			$_SESSION['favorites__item'] = User::getFavorites__item();
		}
	}
	public static function deleteFavorite__item($id){
		if(isset($_SESSION['user'])){
			User::deleteFavorite__item($id);
			$_SESSION['favorites__item'] = User::getFavorites__item();
		}
	}
	//favorite season
	public static function addFavorite__season($id){
		if(isset($_SESSION['user'])){
			User::addFavorite__season($id);
			$_SESSION['favorites__season'] = User::getFavorites__season();
		}
	}
	public static function deleteFavorite__season($id){
		if(isset($_SESSION['user'])){
			User::deleteFavorite__season($id);
			$_SESSION['favorites__season'] = User::getFavorites__Season();
		}
	}
	//favorite seria
	public static function addFavorite__seria($id){
		if(isset($_SESSION['user'])){
			User::addFavorite__seria($id);
			$_SESSION['favorites__seria'] = User::getFavorites__seria();
		}
	}
	public static function deleteFavorite__seria($id){
		if(isset($_SESSION['user'])){
			User::deleteFavorite__seria($id);
			$_SESSION['favorites__seria'] = User::getFavorites__seria();
		}
	}

	//insert comment
	public static function insertComment__item($item_id, $comment_text){
		if(!empty($comment_text)){
			Comment::insertComment__item($item_id, $comment_text);
		}
	}
	public static function insertComment__seria($item_id, $comment_text){
		if(!empty($comment_text)){
			Comment::insertComment__seria($seria_id, $comment_text);
		}
	}

	//other
	public static function getItemsByFilter(){
		$database_response = Items::getItemsByFilter();
		include_once "view/pages/films_and_serials.php";
	}
	public static function error404($str){
		$path = $str;
		include_once "view/pages/error404.php";
	}
	public static function startSite(){
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getAllFilms();
		$database_response_serials = Serial::getAllSerials();		
		include_once "view/pages/films_and_serials.php";
	}
}
?>