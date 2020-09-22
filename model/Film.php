<?php
class Film{
    public static function getAllFilms(){
        $query = "SELECT * FROM item WHERE is_serial=0 ORDER BY year DESC";
        $database = new Database();
        return $database->getAll($query);
    }
    public static function getFilmById($id){
        $query = "SELECT * FROM item WHERE is_serial=0 and 'id'={$id}";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getFilmsByCategory($category_id){
        $query = "SELECT * FROM item WHERE is_serial=0 and category={$category_id} ORDER BY year";
        $database = new Database();
        return $database->getAll($query);
    }
}

?>