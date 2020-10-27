<?php

class Comment{
	//get comments by videoplayer_id
	public static function getComments($videoplayer_id){
		$query = "SELECT * FROM comment WHERE videoplayer_id={$videoplayer_id}";
		$database = new Database();
		return $database->getAll($query);
	}
	//insert comment
	public static function insertComment($videoplayer_id, $comment_text){
		$query = "INSERT INTO comment(user_id, videoplayer_id, user_name, date, text) VALUES({$_SESSION['user']['id']}, {$videoplayer_id}, '{$_SESSION['user']['name']}', CURRENT_TIMESTAMP, '{$comment_text}')";
		$database = new Database();
		return $database->executeRun($query);
	}

	//gide comment
	public static function hideComment($id){
		$query = "UPDATE comment SET hidden=1 WHERE id={$id} AND user_id='{$_SESSION['user']['id']}'";
		$database = new Database();
		return $database->executeRun($query);
	}

	//show comment
	public static function showComment($id){
		$query = "UPDATE comment SET hidden=0 WHERE id={$id} AND user_id='{$_SESSION['user']['id']}'";
		$database = new Database();
		return $database->executeRun($query);
	}	
}

?>