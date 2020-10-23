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

    //get favorites
    public static function getFavorites__item(){
        $query = "SELECT item_id FROM favorite__item WHERE user_id='{$_SESSION['user']['id']}'";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getFavorites__season(){
        $query = "SELECT season_id FROM favorite__season WHERE user_id='{$_SESSION['user']['id']}'";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getFavorites__seria(){
        $query = "SELECT seria_id FROM favorite__seria WHERE user_id='{$_SESSION['user']['id']}'";
        $database = new Database();
        return $database->getAll($query);
    }

    //add & delete favorites
    //item
    public static function addFavorite__item($id){
        $query = "INSERT INTO favorite__item(user_id, item_id) VALUES({$_SESSION['user']['id']}, '{$id}')";
        $database = new Database();
        $database->executeRun($query);
    }
    public static function deleteFavorite__item($id){
        $query = "DELETE FROM favorite__item WHERE user_id={$_SESSION['user']['id']} AND item_id={$id}";
        $database = new Database();
        $database->executeRun($query);
    }
    //season
    public static function addFavorite__season($id){
        $query = "INSERT INTO favorite__season(user_id, season_id) VALUES({$_SESSION['user']['id']}, '{$id}')";
        $database = new Database();
        $database->executeRun($query);
    }
    public static function deleteFavorite__season($id){
        $query = "DELETE FROM favorite__season WHERE user_id={$_SESSION['user']['id']} AND season_id={$id}";
        $database = new Database();
        $database->executeRun($query);
    }
    //seria
    public static function addFavorite__seria($id){
        $query = "INSERT INTO favorite__seria(user_id, seria_id) VALUES({$_SESSION['user']['id']}, '{$id}')";
        $database = new Database();
        $database->executeRun($query);
    }
    public static function deleteFavorite__seria($id){
        $query = "DELETE FROM favorite__seria WHERE user_id={$_SESSION['user']['id']} AND seria_id={$id}";
        $database = new Database();
        $database->executeRun($query);
	}
}

?>