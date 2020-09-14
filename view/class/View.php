<?php
class View{
    public static function viewItems($database_response){
        foreach ($database_response as $value) {
            echo "<div class=\"content__item row\">";
            echo    "<div class=\"content__item-image-box\">";
            echo         "<img class=\"content__item-img\" src=\"".$value['source']."\" alt=\"\">";
            echo    "</div>";
            echo    "<div class=\"content__item-data column\">";
            echo        "<h1 class=\"content__item-title\">".$value['title']."</h1>";
            echo        "<div class=\"content__item-rating\">".$value['rating']."</div>";
            echo       "<p class=\"content__item-year\">".$value['year']."</p>";
            echo            "<p class=\"content__item-description\">".$value['description']."</p>";
            echo         "<button class=\"content__item-more-btn\">Смотреть</button>";
            echo   "</div>";
            echo "</div>";

        }
    }
    public static function viewItem($database_response){

    }
    public static function viewSeasons($database_response){

    }
    public static function viewSerias($database_response){

    }
}
?>

