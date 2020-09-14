<?php
class View{
    public static function viewItems($database_response){
        foreach ($database_response as $value) {
            echo "<div class=\"content__item row\">";
            echo    "<div class=\"content__item-image-box\">";
            echo         "<img class=\"content__item-img\" src=\"".$value['image']."\" alt=\"\">";
            echo    "</div>";
            echo    "<div class=\"content__item-data column\">";
            echo        "<h1 class=\"content__item-title\">".$value['title']."</h1>";
            echo        "<div class=\"content__item-rating\">".$value['rating']."</div>";
            echo       "<p class=\"content__item-year\">".$value['year']."</p>";
            echo            "<p class=\"content__item-description\">".$value['description']."</p>";
            echo         "<a class=\"content__item-more-btn\" href=\"item?id=".$value['id']."\">Смотреть</a>";
            echo   "</div>";
            echo "</div>";

        }
    }
    public static function viewItem($database_response){
        echo "<div class=\"item-player column\">";
        echo    "<div class=\"item-player__header row\">";
        echo        "<div class=\"item-player__image-box\">";
        echo            "<img class=\"content__item-img\" src=\"".$database_response['image']."\" alt=\"\">";
        echo        "</div>";
        echo        "<div class=\"content__item-data column\">";
        echo            "<h1 class=\"content__item-title\">".$database_response['title']."</h1>";
        echo            "<div class=\"content__item-rating\">".$database_response['rating']."</div>";
        echo            "<p class=\"content__item-year\">".$database_response['year']."</p>";
        echo            "<p class=\"content__item-description\">".$database_response['description']."</p>";
        echo            "<a class=\"content__item-more-btn\" href=\"../\">Назад</a>";
        echo        "</div>";
        echo    "</div>";
        echo    "<div class=\"item-player__video-box\">";
        echo        "<iframe class=\"item-player__video\" src=\"".$database_response['source']."\"></iframe>";
        echo    "<div>";
        echo "<div>";
    }
    public static function viewSeasons($database_response){

    }
    public static function viewSerias($database_response){

    }
}
?>

