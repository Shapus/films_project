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

    //get serias
    public static function getSeriasBySeason($season_id){
        $database = new Database();

        $query = "SELECT * FROM item WHERE parent_id={$season_id} and type=4";
        $serias = $database->getAll($query);
        for($i=0;$i<count($serias);$i++) {
            $gotParentSeason = false;
            $gotParentSerial = false;
            $image;
            if(!$gotParentSeason and is_null($serias[$i]['image']) or empty($serias[$i]['image'])){
                $query = "SELECT image, parent_id FROM item WHERE id={$season_id} and type=3";
                $parent = $database->getOne($query);
                $gotParentSeason = true;
            }
            if(!$gotParentSerial and is_null($parent['image']) or empty($parent['image'])){
                $query = "SELECT image FROM item WHERE id={$parent['parent_id']} and type=2";
                $parent = $database->getOne($query);
                $gotParentSeason = true;
            }
            $image = $parent['image'];
            $serias[$i]['image'] = $image;
        }
        return $serias;
    }
    
    //get seria id by season and seria number
    public static function getSeriaId($season_id, $seria_number){
        $query = "SELECT id FROM item WHERE parent_id={$season_id} and number={$seria_number} and type=4";
        $database = new Database();
        return $database->getOne($query)['id'];
    }
}

?>