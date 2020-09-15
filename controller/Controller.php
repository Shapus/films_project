<?php
class Controller{
	public static function getAllCategory(){
		$database_response = Category::getAllCategory();
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/all_categories.php";
	}

	public static function getAllItems(){		
		$database_response = Items::getAllItems();
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

	public static function getItemById($id){
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
		$database_response = Items::getAllItems();
		if(empty($database_response)){
			include_once "view/error404.php";
			return;
		}
		include_once "view/items.php";
	}
}
?>