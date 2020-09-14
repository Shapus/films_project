<?php

class Comments{
	public static function insertComment($id,$comment){
		$query = "INSERT INTO comments(date,news_id,text) VALUES(CURRENT_TIMESTAMP,".$id.",'".$comment."')";
		$database = new Database();
		return $database->executeRun($query);
	}

	public static function getCommentsByItemId($id){
		$query = "SELECT * FROM comments WHERE news_id=".$id;
		$database = new Database();
		return $database->getAll($query);
	}

	public static function getCommentsCountByItemId($id){
		$query = "SELECT COUNT(id) as 'count' FROM comments WHERE news_id=".$id;
		$database = new Database();
		return $database->getOne($query);
	}
}

?>