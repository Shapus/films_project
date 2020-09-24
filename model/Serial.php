<?php

class Serial{
    public static function getAllSerials(){
        $query = "SELECT * FROM item WHERE is_serial=1 ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getSerialById($id){
        $query = "SELECT * FROM item WHERE is_serial=1 and id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getSerialsByCategory($category_id){
        $query = "SELECT * FROM item WHERE is_serial=1 and category_id={$category_id} ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getSeasonsBySerialId($serial_id){
        $query = "SELECT * FROM season WHERE serial_id={$serial_id} ORDER BY number";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getSeriasBySerialSeason($serial_id, $season_number){
        $query = "SELECT * FROM seria 
                  WHERE season_id = (SELECT season_id FROM season
                                     WHERE serial_id = {$serial_id} and number = {$season_number})";
        $database = new Database();
        return $database->getAll($query);
    }   
    public static function getSeria($serial_id, $season_number, $seria_number){
        $query = "SELECT * FROM seria 
                  WHERE number = {$seria_number} and season_id = (SELECT season_id FROM season
                                                                  WHERE serial_id = {$serial_id} and number = {$season_number})";
        $database = new Database();
        return $database->getOne($query);
    }  
}

?>