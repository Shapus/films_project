<?php

class Serial{
    public static function getAllSerials(){
        $query = "SELECT * FROM item WHERE is_serial=1 ORDER BY year";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getSerialById($id){
        $query = "SELECT * FROM serial WHERE is_serial=1 and 'id'={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getSerialsByCategory($category_id){
        $query = "SELECT * FROM item WHERE is_serial=1 and category={$category_id} ORDER BY year";
        $database = new Database();
        return $database->getAll($query);
    }
}

?>