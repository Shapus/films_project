<?php
$item_on_page = 3;
class View{  
    public static function viewItems($database_response,$type){
        global $item_on_page;
        $page = 0;
        $item_count = min($item_on_page, count($database_response));
        if(isset($_GET['page'])) $page = $_GET['page'];
        echo "<div class=\"content__item grid\">";
        for($i=$page*$item_on_page;$i<($page*$item_on_page)+$item_count;$i++) {           
            echo    "<a href=\"".$type."?id=".$database_response[$i]['id']."\" class=\"grid-cell\">";
            echo         "<img class=\"content__item-img\" src=\"".$database_response[$i]['image']."\">";
            echo         "<h2 class=\"content__item-title\">".$database_response[$i]['title']."</h2>";
            echo    "</a>";
        }
        echo "</div>";
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
        echo "            <a href=\"items\"><li class=\"filter__list-item\">Фильмы</li></a>";
        echo "            <a href=\"serials\"><li class=\"filter__list-item\">Сериалы</li></a>";
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
            echo "<a class=\"pages__number\" href=\"?page=".$i."\">".$page_num."</a>";
        }
        echo "  </div>";
        echo "</div>";
    }
    public static function viewSerials($database_response){
        global $item_on_page;
        $page = 0;
        $item_count = min($item_on_page, count($database_response));
        if(isset($_GET['page'])) $page = $_GET['page'];
        echo "<div class=\"content__item grid\">";
        for($i=$page*$item_on_page;$i<($page*$item_on_page)+$item_count;$i++) {           
            echo    "<a href=\"serial?id=".$database_response[$i]['id']."\" class=\"grid-cell\">";
            echo         "<img class=\"content__item-img\" src=\"".$database_response[$i]['image']."\">";
            echo         "<h2 class=\"content__item-title\">".$database_response[$i]['title']."</h2>";
            echo    "</a>";
        }
        echo "</div>";
    }
}
?>

