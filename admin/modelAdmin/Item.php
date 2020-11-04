<?php
$databaseItemColumns = ["id", "type", "category_id", "title", "image", "rating", "number", "year", "parent_id"];
class Item{
    //add item
    public static function add($type, $categoryId, $title, $image, $rating, $year, $parentId){
        $query = "INSERT INTO item(type, category_id, title, image, rating, year, parent_id) VALUES({$type}, {$categoryId}, {$title}, {$image}, {$rating}, {$year}, {$parentId})";
        $database = new Database();
        $database->executeRun($query);
    }
    //edit item
    public static function edit($id, $columnNumber, $newValue){
        $query = "UPDATE item SET {$databaseItemColumns[$columnNumber]}={$newValue} WHERE id={$id}";
        $database = new Database();
        $database->executeRun($query);
    }
    //delete item
    public static function delete($id){
        
    }
}

?>