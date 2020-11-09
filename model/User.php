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
    public static function getFavorites($user_id){
        $query = "SELECT * FROM favorite_item WHERE user_id={$user_id} ORDER BY type";
        $database = new Database();
        return $database->getAll($query);
    }

    public static function getFavoriteItems($favorites){
        $idString = "";
        for($i=0;$i<count($favorites);$i++){
            $idString .= $favorites[$i]['item_id'];
            if($i<count($favorites)-1){
                $idString .= ",";
            }
        }
        $query = "SELECT * FROM item WHERE id IN ({$idString}) ORDER BY type, year";
        $database = new Database();
        return $database->getAll($query);
    }

    //add favorite
    public static function addFavorite($id, $type){
        $query = "INSERT INTO favorite_item(user_id, item_id, type) VALUES({$_SESSION['user']['id']}, {$id}, {$type})";
        $database = new Database();
        $database->executeRun($query);
    }
    //delete favorite
    public static function deleteFavorite($id, $type){
        $query = "DELETE FROM favorite_item WHERE user_id={$_SESSION['user']['id']} AND item_id={$id} AND type={$type}";
        $database = new Database();
        $database->executeRun($query);
    }
}

?>