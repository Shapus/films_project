<?php
class Controller{

	//items
	public static function getAllItems(){	
		$categories = Category::getAllCategories();	
		$database_response = Item::getAllItems();
		$type = 'items';
		include_once "view/items.php";
	}
	public static function getItemById($id){	
		$categories = Category::getAllCategories();	
		$database_response = Item::getItemById($id);
		include_once "view/item.php";
	}
	public static function getItemsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response = Item::getItemsByCategory($category_id);
		$type = 'items';
		include_once "view/items.php";		
	}

	//serials
	public static function getAllSerials(){
		$categories = Category::getAllCategories();
		$database_response = Serial::getAllSerials();	
		$type = 'serials';	
		include_once "view/items.php";
	}
	public static function getSerialById($id){	
		$categories = Category::getAllCategories();	
		$database_response = Serial::getSerialById($id);
		include_once "view/item.php";
	}
	public static function getSerialsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response = Serial::getSerialsByCategory($category_id);
		$type = 'serials';
		include_once "view/items.php";
	}

	//films
	public static function getAllFilms(){
		$categories = Category::getAllCategories();
		$database_response = Film::getAllFilms();	
		$type = 'films';
		include_once "view/items.php";
	} 
	public static function getFilmById($id){
		$categories = Category::getAllCategories();
		$database_response = Film::getFilmById($id);	
		include_once "view/item.php";
	} 
	public static function getfilmsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response = Film::getFilmsByCategory($category_id);
		$type = 'films';
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
		Controller::getAllItems();
	}
}
?>