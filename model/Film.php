<?php
class Film{

    //all films
    public static function getAllFilms(){
        $query = "SELECT * FROM item WHERE type=1 ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }

    //films by category
    public static function getFilmsByCategory($category_id){
        $query = "SELECT * FROM item WHERE type=1 and category_id={$category_id} ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }
}

?>