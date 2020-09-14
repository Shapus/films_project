<?php
class Category{
	public static function getAllCategories(){
		$query = "SELECT name FROM category";
		$database = new Database();
		return $database->getAll($query);
	}
}
?>