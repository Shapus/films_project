<?php

class Item{

    //get one element by id(it may be film, serial, season or seria)
    public static function getElement($id){
        $query = "SELECT * FROM element WHERE id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    //get item (film or serial)
    public static function getItem($id){
        $query = "SELECT * FROM item WHERE id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }

    public static function getByCategory($type, $category){
        if(is_null($category)){
            $query = "SELECT * FROM element WHERE type={$type} ORDER BY year DESC";
        }
        else{
            $query = "SELECT * FROM element WHERE type={$type} AND (SELECT category FROM item WHERE id=element.item_id)={$category} ORDER BY year DESC";
        }
        $database = new Database();
        return $database->getAll($query);
    }



    

    //get film
    public static function getFilm($item_id){
        $query = "SELECT * FROM element WHERE item_id={$item_id} AND type=1";
        $database = new Database();
        return $database->getOne($query);
    }
    //get film player
    public static function getFilmPlayer($id){
        $query = "SELECT * FROM videoplayer WHERE parent_id=(SELECT id FROM element WHERE id={$id} AND type=1)";
        $database = new Database();
        return $database->getOne($query);
    }
    //get searial
    public static function getSerial($item_id){
        $query = "SELECT * FROM element WHERE item_id={$item_id} AND type=2";
        $database = new Database();
        return $database->getOne($query);
    }
    //get seasons
    public static function getSeasons($item_id){
        $query = "SELECT * FROM element WHERE item_id={$item_id} AND type=3";
        $database = new Database();
        return $database->getAll($query);
    }
    //get season
    public static function getSeason($item_id, $season_number){
        $query = "SELECT * FROM element WHERE item_id={$item_id} AND type=3 AND season_number={$season_number}";
        $database = new Database();
        return $database->getAll($query);
    }
    //get season
    public static function getSerias($item_id, $season_number){
        $query = "SELECT * FROM element WHERE item_id={$item_id} AND type=4 AND season_number={$season_number}";
        $database = new Database();
        return $database->getAll($query);
    }

    //get film
    public static function getSeria($item_id, $season_number, $seria_number){
        $query = "SELECT * FROM element WHERE item_id={$item_id} AND season_number={$season_number} AND seria_number={$seria_number} AND type=4";
        $database = new Database();
        return $database->getOne($query);
    }
    //get seria player
    public static function getSeriaPlayer($item_id, $season_number, $seria_number){
        $query = "SELECT * FROM videoplayer WHERE parent_id=(SELECT id FROM element WHERE item_id={$item_id} AND type=4 AND season_number={$season_number} AND seria_number={$seria_number})";
        $database = new Database();
        return $database->getOne($query);
    }



    //number of serias
    public static function seriasCount($item_id){
        $query = "SELECT count(*) as count FROM element WHERE item_id={$item_id} AND type=4";
        $database = new Database();
        $serias = $database->getOne($query);
        if($serias){
            return $serias['count'];
        }
        return 0;
    }
    //get serials names
    public static function getParents($ids){
        $size = count($ids);
        $idString = "";
        for($i=0;$i<$size;$i++) {
            $idString .= $ids[$i];
            if($i<$size-1){
                $idString .= ",";
            }
        }
        $query = "SELECT * FROM item WHERE id IN ({$idString})";
        $database = new Database();
        return $database->getAll($query);
    }
}

?>