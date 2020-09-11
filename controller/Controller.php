<?php
class Controller{
	public static function startSite(){
		$array = News::getLastThreeNews();
		include_once 'view/start.php';
	}

	public static function getAllCategory(){
		$array = Category::getAllCategory();
		include_once 'view/all_categories.php';
	}

	public static function getAllNews(){
		$array = News::getAllNews();
		include_once 'view/all_news.php';
	}

	public static function getNewsByCategoryId($category_id){
		$array = News::getNewsByCategoryId($category_id);
		include_once 'view/category_news.php';
	}

	public static function getNewsById($id){
		$news = News::getNewsById($id);
		include_once 'view/read_news.php';
	}

	public static function insertComment($id,$comment){
		$array = Comments::insertComment($id,$comment);
		header('Location:news?id='.$id.'#comments');
	}

	public static function comments($news_id){
		$array = Comments::getCommentsByNewsId($news_id);
		ViewComments::commentsByNews($array);
	}

	public static function commentsCount($news_id){
		$array = Comments::getCommentsCountByNewsId($news_id);
		ViewComments::commentsCount($array);
	}

	public static function commentsCountWithAnchor($news_id){
		$array = Comments::getCommentsCountByNewsId($news_id);
		ViewComments::commentsCountWithAnchor($array);
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
}
?>