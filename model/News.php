<?php
class News{
	public static function getLastThreeNews(){
		$query = "SELECT * FROM news ORDER BY id LIMIT 3";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getAllNews(){
		$query = "SELECT * FROM news ORDER BY id DESC";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getNewsByCategoryId($category_id){
		$query = "SELECT * FROM news WHERE category_id=\"".(string)$category_id."\" ORDER BY id DESC";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getNewsById($id){
		$query = "SELECT * FROM news WHERE id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getOne($query);
	}

}
?>