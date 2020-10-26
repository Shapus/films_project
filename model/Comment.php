<?php

class Comment{
	//item comments
	public static function insertComment__item($item_id,$comment_text){
		$query = "INSERT INTO comment__item(user_id, user_name, item_id, date, text) VALUES({$_SESSION['user']['id']}, '{$_SESSION['user']['name']}', {$item_id}, CURRENT_TIMESTAMP, '{$comment_text}')";
		$database = new Database();
		return $database->executeRun($query);
	}
	public static function hideComment__item($id){
		$query = "UPDATE comment__item SET hidden=1 WHERE id={$id} AND user_id='{$_SESSION['user']['id']}'";
		$database = new Database();
		return $database->executeRun($query);
	}
	public static function viewComment__item($id){
		$query = "UPDATE comment__item SET hidden=0 WHERE id={$id} AND user_id='{$_SESSION['user']['id']}'";
		$database = new Database();
		return $database->executeRun($query);
	}
	public static function getComments__item($id){
		$query = "SELECT * FROM comment__item WHERE item_id={$id}";
		$database = new Database();
		return $database->getAll($query);
	}

	//seria comments
	public static function insertComment__seria($seria_id,$comment_text){
		$query = "INSERT INTO comment__seria(user_id, user_name, seria_id,date,text) VALUES({$_SESSION['user']['id']}, '{$_SESSION['user']['name']}', {$seria_id}, CURRENT_TIMESTAMP, '{$comment_text}')";
		$database = new Database();
		return $database->executeRun($query);
	}
	public static function hideComment__seria($id){
		$query = "UPDATE comment__seria SET hidden=1 WHERE id={$id} AND user_id='{$_SESSION['user']['id']}'";
		$database = new Database();
		return $database->executeRun($query);
	}
	public static function viewComment__seria($id){
		$query = "UPDATE comment__seria SET hidden=0 WHERE id={$id} AND user_id='{$_SESSION['user']['id']}'";
		$database = new Database();
		return $database->executeRun($query);
	}
	public static function getComments__seria($id){
		$query = "SELECT * FROM comment__seria WHERE seria_id={$id}";
		$database = new Database();
		return $database->getAll($query);
	}	
}

?>