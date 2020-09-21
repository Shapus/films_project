<?php
class Items{
	public static function getFilms(){
		$query = "SELECT * FROM film ORDER BY id DESC";
		$database = new Database();
		return $database->getAll($query);
	}
	public static function getAllSerials(){
		$query = "SELECT * FROM serial ORDER BY id DESC";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getItemsByFilter(){
		$query = "";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getFilmById($id){
		$query = "SELECT * FROM film WHERE id=\"".$id."\"";
		$database = new Database();
		return $database->getOne($query);
	}

	public static function getSeasonsBySerialId($id){
		$query = "SELECT * FROM season WHERE serial_id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getItemsBySeasonId($id){
		$query = "SELECT * FROM item WHERE season_id=\"".(string)$id."\"";
		$database = new Database();
		return $database->getAll($query);
	}
	public static function getAll(){
		$query = "SELECT * FROM film,serial";
		$database = new Database();
		return $database->getAll($query);
	}
}
?>