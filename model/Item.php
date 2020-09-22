<?php
class Item{
	public static function getAllItems(){
		$query = "SELECT * FROM item ORDER BY year";
		$database = new Database();
		return $database->getAll($query);
	}
	public static function getItemById($id){
		$query = "SELECT * FROM item WHERE 'id'={$id}";
		$database = new Database();
		return $database->getOne($query);
	}
	public static function getItemsByCategory($category_id){
        $query = "SELECT * FROM item WHERE category={$category_id} ORDER BY year";
        $database = new Database();
        return $database->getAll($query);
    }
}
?>