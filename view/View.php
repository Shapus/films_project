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
        echo            "<a class=\"content__item-more-btn\" href=\"./\">Назад</a>";
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
    public static function viewCategories($database_response){
        foreach($database_response as $value){
            echo "<option class=\"categories__item\" value=\"".$value['name']."\">".$value['name']."</oprion>";
        }
    }
    public static function viewFilter(){
    echo "<div class=\"content__filter\">"
    echo "<div class=\"filter column column--center\">"
    echo "        <ul class=\"filter__title-list row\">"
    echo "            <li class=\"filter__list-item\">Фильмы</li>"
    echo "            <li class=\"filter__list-item\">Сериалы</li>"
    echo "            <li class=\"filter__list-item\">Год выпускуа</li>"
    echo "            <li class=\"filter__list-item\">Оценка пользователей</li>"
    echo "        </ul>"
    echo "    </div>"
    echo "    <div class=\"filter__grid\">"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "        <div class=\"filter__grid-cell row row--center\">"
    echo "            <img class=\"filter__grid-img\" src=\"\" alt=\"\">"
    echo "            <p class=\"filter__grid-text\">genre_1</p>"
    echo "        </div>"
    echo "    </div>"
    echo "</div>"
    }
}
?>

