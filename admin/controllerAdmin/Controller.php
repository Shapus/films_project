<?php
$_SESSION['categories'] = Category::getAll();

class Controller{
	
//============================================================================== START
	//enter
	public static function enter(){
		include "viewAdmin/pages/enter.php";
	}
	//enterAnswer
	public static function enterAnswer(){
		if(isset($_POST['email']) and isset($_POST['password'])){
			Enter::login($_POST['email'], $_POST['password']);
		}
		include "viewAdmin/pages/enterAnswer.php";
	}
	//dashbord
	public static function dashbord(){
		$items = Item::getAll();
		include "viewAdmin/pages/dashboard.php";
	}





//============================================================================== ITEMS
	//add film | serial
	public static function addItem($type, $categoryId, $title, $image, $rating, $number, $year, $parentId){
		Item::add($type, $categoryId, $title, $image, $rating, $year, $parentId);
	}
	//edit film | serial
	public static function eidtItem($id, $columnNumber, $newValue){
		Item::edit($id, $columnNumber, $newValue);
	}
	//delete film | serial
	public static function deleteItem($id){
		Item::delete($id);
	}
	//get all items
	public static function getAllItems($type){
		$items = Item::getAll();
		include "viewAdmin/pages/dashboard.php";
	}
	//get item
	public static function getItem($id){
		$item = Item::get($id);
		if($item['type'] == 1){
			include "viewAdmin/pages/film";
		}
		elseif($item['type'] == 2){
			include "viewAdmin/pages/serial";
		}
		elseif($item['type'] == 3){
			include "viewAdmin/pages/season";
		}
		elseif($item['type'] == 4){
			include "viewAdmin/pages/seria";
		}
	}





//============================================================================== VIDEOPLAYER
	//add videoplayer
	public static function addVideo($description, $source, $parent_id){
		Video::add($description, $source, $parent_id);
	}
	//edit videoplayer
	public static function eidtVideo($id, $columnNumber, $newValue){
		Video::edit($id, $columnNumber, $newValue);
	}
	//delete videoplayer
	public static function deleteVideo($id){
		Video::delete($id);
	}
	//get video





//============================================================================== COMMENTS
	//show comment
	public static function showComment($id){
		Comment::show($id);
	}
	//hide comment
	public static function hideComment($id){
		Comment::hide($id);
	}
	//get all comments





//============================================================================== ERROR 404
	//page not found
	public static function error404(){
		include_once "viewAdmin/pages/error404.php";
	}
}

?>