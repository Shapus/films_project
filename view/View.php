<?php
$item_on_page = 2;
class View{
    
    public static function viewItems($database_response){
        global $item_on_page;
        $page = 0;
		if(isset($_GET['page'])) $page = $_GET['page'];
        for($i=$page*$item_on_page;$i<($page+1)*$item_on_page;$i++) {
            echo "<div class=\"content__item row\">";
            echo    "<div class=\"content__item-image-box\">";
            echo         "<img class=\"content__item-img\" src=\"".$database_response[$i]['image']."\" alt=\"\">";
            echo    "</div>";
            echo    "<div class=\"content__item-data column\">";
            echo        "<h1 class=\"content__item-title\">".$database_response[$i]['title']."</h1>";
            echo        "<div class=\"content__item-rating\">".$database_response[$i]['rating']."</div>";
            echo       "<p class=\"content__item-year\">".$database_response[$i]['year']."</p>";
            echo            "<p class=\"content__item-description\">".$database_response[$i]['description']."</p>";
            echo         "<a class=\"content__item-more-btn\" href=\"item?id=".$database_response[$i]['id']."\">Смотреть</a>";
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
    public static function viewFilter($database_response){
        echo "  <div class=\"content__filter\">";
        echo "      <div class=\"filter column column--center\">";
        echo "        <ul class=\"filter__title-list row\">";
        echo "            <li class=\"filter__list-item\">Фильмы</li>";
        echo "            <li class=\"filter__list-item\">Сериалы</li>";
        echo "            <li class=\"filter__list-item\">Год выпускуа</li>";
        echo "            <li class=\"filter__list-item\">Оценка пользователей</li>";
        echo "        </ul>";
        echo "        <div class=\"filter__grid\">";
        foreach($database_response as $value){
            echo "            <div class=\"filter__grid-cell row\">";
            echo "                <img class=\"filter__grid-img\" src=\"".$value['icon']."\" alt=\"\">";
            echo "                <p class=\"filter__grid-text\">".$value['name']."</p>";
            echo "            </div>";
        }
        echo "        </div>";
        echo "      </div>";
        echo "  </div>";
    }
    public static function viewPagesNumbers($database_response){
        global $item_on_page;
        echo "<div class=\"pages\">";
        echo "  <div class=\"pages__inner row row--center\">";
        for($i=0;$i<count($database_response)/$item_on_page;$i++){
            $page_num = $i+1;
            echo "<a class=\"pages__number\" href=\"items?page=".$i."\">".$page_num."</a>";
        }
        echo "  </div>";
        echo "</div>";
    }
}
?>

