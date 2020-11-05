<?php

class Serial{
    //get seasons
    public static function getSeasons($serial_id){
        $database = new Database();
        $query = "SELECT * FROM item WHERE parent_id={$serial_id} and type=3";
        $seasons = $database->getAll($query);
        return $seasons;
    }

    //get serias
    public static function getSerias($season_id){
        $database = new Database();
        $query = "SELECT * FROM item WHERE parent_id={$season_id} and type=4";
        $serias = $database->getAll($query);
        return $serias;
    }
    
    //get seria id by season and seria number
    public static function getSeriaId($season_id, $seria_number){
        $query = "SELECT id FROM item WHERE parent_id={$season_id} and number={$seria_number} and type=4";
        $database = new Database();
        $seria = $database->getOne($query);
        if($seria){
            return $seria['id'];
        }
        return null;
    }

    //get season id by serial and season number
    public static function getSeasonId($serial_id, $season_number){
        $query = "SELECT id FROM item WHERE parent_id={$serial_id} and number={$season_number} and type=3";
        $database = new Database();
        $season = $database->getOne($query);
        if($season){
            return $season['id'];
        }
        return null;
    }

    //number of serias
    public static function getSeriasCount($season_id){
        $query = "SELECT count(*) FROM item WHERE parent_id={$season_id} and type=4";
        $database = new Database();
        return $database->getOne($query);
    }
}

?>