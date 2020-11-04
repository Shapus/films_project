<?php
class Comment{
    //show comment
	public static function show($id){
        $query = "UPDATE comment SET hide=0 WHERE id={$id}";
        $database = new Database();
        $database->executeRun($query);
	}
	//hide comment
	public static function hide($id){
        $query = "UPDATE comment SET hide=1 WHERE id={$id}";
        $database = new Database();
        $database->executeRun($query);
	}
}

?>