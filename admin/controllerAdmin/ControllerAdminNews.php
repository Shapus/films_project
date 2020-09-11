<?php

class ControllerAdminNews{
	public static function getNewsList(){
		$newsArray = modelAdminNews::getNewsList();
		include_once 'viewAdmin/templates/newsList.php';
	}
	public static function newsAddForm(){
		$categoryArray = ModelAdminCategory::getCategoryList();
		include_once('viewAdmin/templates/newsAddForm.php');
	}
	public static function newsAddResult(){
		$test = ModelAdminNews::getNewsAdd();
		include_once('viewAdmin/templates/newsAddForm.php');
	}
	public static function newsEditForm($id){
		$array = ModelAdminCategory::getCategoryList();
		$detail = ModelAdminNews::getNewsDetail($id);
		include_once('viewAdmin/templates/newsEditForm.php');
	}
	public static function newsEditResult($id){
		$test = ModelAdminNews::getNewsEdit($id);
		include_once('viewAdmin/templates/newsEditForm.php');
	}
	public static function newsDeleteForm($id){
		$array = ModelAdminCategory::getCategoryList();
		$detail = ModelAdminNews::getNewsDetail($id);
		include_once('viewAdmin/templates/newsDeleteForm.php');
	}
	public static function newsDeleteResult($id){
		$test = ModelAdminNews::getNewsDelete($id);
		include_once('viewAdmin/templates/newsDeleteForm.php');
	}
}

?>