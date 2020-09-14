<?php
class Controller{
	public static function getAllCategory(){
		$database_response = Category::getAllCategory();
		include_once 'view/all_categories.php';
	}

	public static function getAllItems(){
		
		$database_response = Items::getAllItems();
		include_once 'view/items.php';
	}

	public static function getItemsByFilter(){							//!!!
		$database_response = Items::getItemsByFilter();
		include_once 'view/items.php';
	}

	public static function getItemById($id){
		$database_response = Items::getItemById();
		include_once 'view/item.php';
	}

	public static function insertComment($id,$comment){
		$database_response = Comments::insertComment($id,$comment);
		header('Location:news?id='.$id.'#comments');
	}

	public static function comments($news_id){
		$database_response = Comments::getCommentsByNewsId($news_id);
		ViewComments::commentsByNews($database_response);
	}

	public static function commentsCount($news_id){
		$database_response = Comments::getCommentsCountByNewsId($news_id);
		ViewComments::commentsCount($database_response);
	}

	public static function commentsCountWithAnchor($news_id){
		$database_response = Comments::getCommentsCountByNewsId($news_id);
		ViewComments::commentsCountWithAnchor($database_response);
	}

	public static function registrationForm(){
		include_once 'view/registrationForm.php';
	}

	public static function registrationAnswer(){
		include_once 'view/registrationAnswer.php';
	}

	public static function error404(){
		include_once 'view/error404.php';
	}

	public static function startSite(){
		Controller::getAllItems();
	}
}
?>