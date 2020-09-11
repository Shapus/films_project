<?php
class Category{
	public static function getAllCategory(){
		$query = "SELECT * FROM category";
		$database = new Database();
		return $database->getAll($query);
	}
}
?>