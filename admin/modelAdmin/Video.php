<?php
$databaseVideoColumns = ["id", "description", "source", "parent_id"];
class Viedo{
    //add videoplayer
    public static function add($description, $source, $parent_id){
        $query = "INSERT INTO videoplayer(description, source, parent_id) VALUES({$description}, {$source}, {$parent_id})";
        $database = new Database();
        $database->executeRun($query);
    }
    //edit videoplayer
    public static function edit($id, $columnNumber, $newValue){
        $query = "UPDATE videoplayer SET {$databaseVideoColumns[$columnNumber]}={$newValue} WHERE id={$id}";
        $database = new Database();
        $database->executeRun($query);
    }
    //delete videoplayer
    public static function delete($id){
        $query = "DELETE FROM videoplayer WHERE id={$id}";
        $database = new Database();
        $database->executeRun($query);
    }
}

?>