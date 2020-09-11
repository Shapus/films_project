<?php

class ModelAdminCategory{

	public static function getCategoryList(){
		$query = "SELECT * FROM category ORDER BY id";
		$database = new Database();
		return $database->getAll($query);
	}
}

?>