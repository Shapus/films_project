<?php

class Item{

    //get one element by id(it may be film, serial, season or seria)
    public static function get($id){
        $query = "SELECT * FROM item WHERE id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    //get all elements, belong to item_id. If it's film - it will be film. If it's serial - it will be serial, seasons and serias
    public static function getItem($item_id, $type){
        if(is_null($type) or $type == 0){
            $query = "SELECT * FROM item WHERE item_id={$id}";
        }
        else{
            $query = "SELECT * FROM item WHERE item_id={$id} AND type={$type}";
        }
        $database = new Database();
        return $database->getAll($query);
    }

    public static function getByCategory($type, $category){
        if(is_null($category)){
            $query = "SELECT * FROM item WHERE type={$type} ORDER BY year DESC";
        }
        else{
            $query = "SELECT * FROM item WHERE type={$type} and category_id={$category} ORDER BY year DESC";
        }
        $database = new Database();
        return $database->getAll($query);
    }



    

    //get film
    public static function getFilm($item_id){
        $query = "SELECT * FROM item WHERE item_id={$item_id} AND type=1";
        $database = new Database();
        return $database->getOne($query);
    }
    //get film player
    public static function getFilmPlayer($item_id){
        $query = "SELECT * FROM videoplayer WHERE parent_id=(SELECT id FROM item WHERE item_id={$item_id} AND type=1)";
        $database = new Database();
        return $database->getOne($query);
    }
    //get searial
    public static function getSerial($item_id){
        $query = "SELECT * FROM item WHERE item_id={$item_id} AND type IN (2)";
        $database = new Database();
        return $database->getAll($query);
    }
    //get seasons
    public static function getSeasons($item_id){
        $query = "SELECT * FROM item WHERE item_id={$item_id} AND type=3";
        $database = new Database();
        return $database->getAll($query);
    }
    //get season
    public static function getSeason($item_id, $season_number){
        $query = "SELECT * FROM item WHERE item_id={$item_id} AND type=4 AND season_number={$season_number}";
        $database = new Database();
        return $database->getAll($query);
    }

    //get film
    public static function getSeria($item_id, $season_number, $seria_number){
        $query = "SELECT * FROM item WHERE item_id={$item_id} AND season_number={$season_number} AND seria_number={$seria_number} AND type=4";
        $database = new Database();
        return $database->getOne($query);
    }
    //get seria player
    public static function getSeriaPlayer($item_id, $season_number, $seria_number){
        $query = "SELECT * FROM videoplayer WHERE parent_id=(SELECT id={$item_id} AND type=4 AND season_number={$season_number} AND seria_number={$seria_number}";
        $database = new Database();
        return $database->getOne($query);
    }
}

?>