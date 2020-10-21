<?php
class Controller{



	//items
	public static function getAllItems(){	
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getAllFilms();
		$database_response_serials = Serial::getAllSerials();
		include_once "view/blocks/items.php";
	}
	public static function getItemById($id){	
		$database_response = Item::getItemById($id);
		if($database_response['type'] == 'serial'){
			$database_response = Serial::getSerialById($id);
			include_once "view/blocks/serial.php";
		}
		elseif($database_response['type'] == 'film'){
			$database_response = Film::getItemById($id);
			include_once "view/blocks/item.php";
		}
	}
	public static function getItemsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getFilmsByCategory($category_id);	
		$database_response_serials = Serial::getSerialsByCategory($category_id);
		include_once "view/blocks/items.php";		
	}



	//serials
	public static function getAllSerials(){
		$categories = Category::getAllCategories();	
		$database_response_serials = Serial::getAllSerials();		
		include_once "view/blocks/items.php";
	}
	public static function getSeasonsBySerialId($id){	
		$database_response = Serial::getSeasonsBySerialId($id);
		include_once "view/blocks/serial.php";
	}
	public static function getSerialsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response_serials = Serial::getSerialsByCategory($category_id);
		include_once "view/blocks/items.php";
	}
	public static function getSeriasBySerialSeason($serial_id, $season_number){
		$database_response = Serial::getSeriasBySerialSeason($serial_id, $season_number);
		include_once "view/blocks/season.php";
	}
	public static function getSeria($serial_id, $season_number, $seria_number){
		$database_response = Serial::getSeria($serial_id, $season_number, $seria_number);
		include_once "view/blocks/seria.php";
	}



	//films
	public static function getAllFilms(){
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getAllFilms();
		include_once "view/blocks/items.php";
	} 
	public static function getFilmById($id){
		$database_response = Film::getFilmById($id);	
		include_once "view/blocks/item.php";
	} 
	public static function getfilmsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getFilmsByCategory($category_id);
		include_once "view/blocks/items.php";
	}

	//registration
	public static function registration(){
		include_once "view/blocks/registration.php";
	}
	public static function registrationAnswer(){
		$control = Registration::registrationUser();
		include_once "view/blocks/registrationAnswer.php";
	}

	//entring
	public static function enter(){
		include_once "view/blocks/enter.php";
	}
	public static function enterAnswer($email, $password){
		$_SESSION['user'] = null;
		$passwordHash = User::getPasswordHash($email)['password'];
		if(password_verify($password, $passwordHash)){
			$_SESSION['user'] = User::getUser($email);
			$_SESSION['favorites'] = User::getFavorites($email);
		}
		include_once "view/blocks/enterAnswer.php";
	}

	//favorite items
	public static function addFavorite($id, $type){
		if(isset($_SESSION['user'])){
			User::addFavorite($id, $type);
			$_SESSION['favorites'] = User::getFavorites();
		}
	}
	public static function deleteFavorite($id, $type){
		if(isset($_SESSION['user'])){
			User::deleteFavorite($id, $type);
			$_SESSION['favorites'] = User::getFavorites();
		}
	}

	//other
	public static function getItemsByFilter(){
		$database_response = Items::getItemsByFilter();
		if(empty($database_response)){
			include_once "view/blocks/error404.php";
			return;
		}
		include_once "view/blocks/items.php";
	}
	public static function error404($str){
		$path = $str;
		include_once "view/blocks/error404.php";
	}
	public static function startSite(){
		$categories = Category::getAllCategories();	
		$database_response_films = Film::getAllFilms();
		$database_response_serials = Serial::getAllSerials();		
		include_once "view/blocks/start.php";
	}
}
?>