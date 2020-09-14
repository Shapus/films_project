<?php
class Items{
	public static function getAllItems(){
		$query = "SELECT * FROM item ORDER BY id DESC";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getItemsByFilter(){
		$query = "";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getItemById($id){
		$query = "SELECT * FROM item WHERE id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getOne($query);
	}

	public static function getSeasonsBySerialId($id){
		$query = "SELECT * FROM season WHERE serial_id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getSeriasBySeasonId($id){
		$query = "SELECT * FROM seria WHERE season_id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getSeriaById($id){
		$query = "SELECT * FROM seria WHERE id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getOne($query);
	}
}
?>