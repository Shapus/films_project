<?php
class Film{
    public static function getAllFilms(){
        $query = "SELECT * FROM item WHERE type=\"films\" ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getFilmById($id){
        $query = "SELECT * FROM item WHERE id={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getFilmsByCategory($category_id){
        $query = "SELECT * FROM item WHERE type=\"films\" and category_id={$category_id} ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }
}

?>