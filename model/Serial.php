<?php

class Serial{

    //get all serials
    public static function getAllSerials(){
        $query = "SELECT * FROM item WHERE type=2 ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }

    //get serials by category
    public static function getSerialsByCategory($category_id){
        $query = "SELECT * FROM item WHERE type=2 and category_id={$category_id} ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }

    //get serial
    public static function getSerialById($id){
        $query = "SELECT * FROM item WHERE type=2 and id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }

    //get serial name
    public static function getSerialName($id){
        $query = "SELECT title FROM item WHERE type=2 and id={$id}";
        $database = new Database();
        $serial = $database->getOne($query);
        if($serial){
            return $serial['title'];
        }
        return "Сериал";
    }

    //get seasons
    public static function getSeasonsBySerialId($serial_id){
        $database = new Database();

        $query = "SELECT * FROM item WHERE parent_id={$serial_id} and type=3";
        $seasons = $database->getAll($query);
        for($i=0;$i<count($seasons);$i++) {
            $gotParent = false;
            
            if(is_null($seasons[$i]['image']) or empty($seasons[$i]['image'])){
                if(!$gotParent){
                    $query = "SELECT image FROM item WHERE id={$serial_id} and type=2";
                    $parent = $database->getOne($query);
                    $gotParent = true;
                }
                $seasons[$i]['image'] = $parent['image'];
            }
        }
        return $seasons;
    }

    //get season name
    public static function getSeasonName($id){
        $query = "SELECT number FROM item WHERE type=3 and id={$id}";
        $database = new Database();
        $season = $database->getOne($query);
        if($season){
            return "Сезон {$season['number']}";
        }
        return "Сезон";
    }

    //get serias
    public static function getSeriasBySeason($season_id){
        $database = new Database();

        $query = "SELECT * FROM item WHERE parent_id={$season_id} and type=4";
        $serias = $database->getAll($query);
        for($i=0;$i<count($serias);$i++) {
            if(is_null($serias[$i]['image']) or empty($serias[$i]['image'])){
                $query = "SELECT image, parent_id FROM item WHERE id={$season_id} and type=3";
                $parent = $database->getOne($query);
                $serias[$i]['image'] = $parent['image'];
            }
            if(is_null($serias[$i]['image']) or empty($serias[$i]['image'])){
                $query = "SELECT image FROM item WHERE id={$parent['parent_id']} and type=2";
                $parent = $database->getOne($query);
                $serias[$i]['image'] = $parent['image'];
            }
        }
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
        return -1;
    }

    //get season id by serial and season number
    public static function getSeasonId($serial_id, $season_number){
        $query = "SELECT id FROM item WHERE parent_id={$serial_id} and number={$season_number} and type=3";
        $database = new Database();
        $season = $database->getOne($query);
        if($season){
            return $season['id'];
        }
        return -1;
    }

    //number of serias
    public static function getSeriasCount($season_id){
        $query = "SELECT count(*) FROM item WHERE parent_id={$season_id} and type=4";
        $database = new Database();
        return $database->getOne($query);
    }
}

?>