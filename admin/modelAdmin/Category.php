<?php
class Category{
	public static function getAll(){
		$query = "SELECT * FROM category";
		$database = new Database();
		return $database->getAll($query);
	}
}
?>