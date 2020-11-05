<?php

class Item{
    public static function get($id){
        $query = "SELECT * FROM item WHERE id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getAll($type, $category){
        if(is_null($category)){
            $query = "SELECT * FROM item WHERE type={$type} ORDER BY year DESC";
        }
        else{
            $query = "SELECT * FROM item WHERE type={$type} and category_id={$category} ORDER BY year DESC";
        }
        $database = new Database();
        return $database->getAll($query);
    }
}

?>