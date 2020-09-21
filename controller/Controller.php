<?php
class Controller{
	public static function getAll(){	
		$categories = Category::getAllCategories();	
		$database_response_serials = Controller::getAllSerials();
		$database_response_films = Controller::getAllFilms();
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}		
		include_once "view/items.php";
	}
	public static function getAllSerials(){
		$categories = Category::getAllCategories();
		$database_response = Items::getAllSerials();
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}		
		include_once "view/items.php";
	} 
	public static function getAllFilms(){
		$categories = Category::getAllCategories();
		$database_response = Items::getAllFilms();
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}		
		include_once "view/items.php";
	} 
	public static function getItemsByFilter(){							//!!!
		$database_response = Items::getItemsByFilter();
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/items.php";
	}

	public static function getFilmById($id){
		$database_response = Items::getItemById($id);
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/item.php";
	}

	public static function getSeasonsBySerialId($id){
		$database_response = Items::getSeasonsBySerialId($id);
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/seasons.php";
	}

	public static function getItemsBySeasonId($id){
		$database_response = Items::getItemsBySeasonId($id);
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/serias.php";
	}
	public static function error404(){
		include_once "view/error404.php";
	}

	public static function startSite(){
		Controller::getAll();
	}
}
?>