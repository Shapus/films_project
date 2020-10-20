<?php

class User{
    public static function getPasswordHash($email){
        $query = "SELECT password FROM user WHERE email='{$email}'";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getUser($email){
        $query = "SELECT * FROM user WHERE email='{$email}'";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getFavorites(){
        $query = "SELECT item_id,item_type FROM favorite_item WHERE user_id='{$_SESSION['user']['id']}'";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function addFavorite($id, $type){
		$query = "INSERT INTO favorite_item(user_id, item_id, item_type) VALUES({$_SESSION['user']['id']}, {$id}, '{$type}')";
        $database = new Database();
        $database->executeRun($query);
	}
}

?>