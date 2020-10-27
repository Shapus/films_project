<?php
class Videoplayer{

    //get data for correct videoplayer page view (needed data stores in VIDEOPLAYER and ITEM table, necessary get it from both tables)
    public static function getVideoplayer($item_id){
        $database = new Database();
        $out = array();
        //get data from videoplayer
        $query = "SELECT * FROM videoplayer WHERE parent_id={$item_id}";
        $videoplayer = $database->getOne($query);
        //get data from item
        $query = "SELECT * FROM item WHERE id={$item_id}";
        $parent = $database->getOne($query);
        //set VIDEOPLAYER wanting data
        if($videoplayer and count($videoplayer) > 0 and count($parent) > 0){
            $out = $videoplayer;
            $out['year'] = $parent['year'];
            $out['rating'] = $parent['rating'];
            $out['type'] = $parent['type'];
            if($parent['type'] == 1){
                $out['title'] = $parent['title'];
            }
            else if($parent['type'] == 4){
                if(is_null($parent['title']) or empty($parent['title'])){
                    $out['title'] = "Серия ".$parent['number'];
                }
                else{
                    $out['title'] = $parent['title'];
                }
            }
            $out['image'] = $parent['image'];
            if(is_null($parent['image']) or empty($parent['image'])){
                $query = "SELECT image FROM item WHERE id={$parent['parent_id']}";
                $parent = $database->getOne($query);
                $out['image'] = $parent['image'];
            }
        }
        return $out;
    }
}

?>