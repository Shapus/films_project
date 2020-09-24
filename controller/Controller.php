<?php
class Controller{

	//items
	public static function getAllItems(){	
		$categories = Category::getAllCategories();	
		$database_response = Item::getAllItems();
		include_once "view/items.php";
	}
	public static function getItemById($id){	
		$database_response = Item::getItemById($id);
		if($database_response['is_serial'] == 1){
			$database_response = Serial::getSerialById($id);
			include_once "view/serial.php";
		}
		else{
			$database_response = Serial::getFilmById($id);
			include_once "view/item.php";
		}
	}
	public static function getItemsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response = Item::getItemsByCategory($category_id);
		include_once "view/items.php";		
	}

	//serials
	public static function getAllSerials(){
		$categories = Category::getAllCategories();
		$database_response = Serial::getAllSerials();		
		include_once "view/items.php";
	}
	public static function getSerialById($id){	
		$database_response = Serial::getSeasonsBySerialId($id);
		include_once "view/serial.php";
	}
	public static function getSerialsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response = Serial::getSerialsByCategory($category_id);
		include_once "view/items.php";
	}
	public static function getSeasonsBySerialId($id){
		$database_response = Serial::getSeasonsBySerialId($id);
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/serial.php";
	}
	public static function getSeriasBySerialSeason($serial_id, $season_number){
		$database_response = Serial::getSeriasBySerialSeason($serial_id, $season_number);
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/season.php";
	}
	public static function getSeria($serial_id, $season_number, $seria_number){
		$database_response = Serial::getSeria($serial_id, $season_number, $seria_number);
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/seria.php";
	}

	//films
	public static function getAllFilms(){
		$categories = Category::getAllCategories();
		$database_response = Film::getAllFilms();	
		include_once "view/items.php";
	} 
	public static function getFilmById($id){
		$database_response = Film::getFilmById($id);	
		include_once "view/item.php";
	} 
	public static function getfilmsByCategory($category_id){	
		$categories = Category::getAllCategories();	
		$database_response = Film::getFilmsByCategory($category_id);
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
		$categories = Category::getAllCategories();	
		$database_response = Item::getAllItems();
		$type = 'items';
		
		include_once "view/items.php";
	}
}
?>