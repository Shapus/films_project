<?php
$item_on_page = 6;
class View{  
    public static function viewItems($database_response){
        global $item_on_page;
        $page = 0;
        if(isset($_GET['page'])) $page = $_GET['page'];
        $i = 0;
        $current_item = $page*$item_on_page+$i;

        echo "<div class=\"content__item grid\">";
        while($i<$item_on_page and count($database_response)>$current_item) {      
            $type = 'films';
            if($database_response[$current_item]['is_serial'] == 1) $type = 'serials';     
            echo    "<a href=\"".$type."?id={$database_response[$current_item]['id']}\" class=\"grid-cell\">";
            echo         "<img class=\"content__item-img\" src=\"images/{$database_response[$current_item]['image']}\">";
            echo         "<h2 class=\"content__item-title\">{$database_response[$current_item]['title']}</h2>";
            echo    "</a>";
            $i++;
            $current_item = $page*$item_on_page+$i;
        }
    }
    public static function viewFilter($database_response){
        $host = explode('?', $_SERVER['REQUEST_URI'])[0];
        $num = substr_count($host, '/');
        $path = explode('/',$host)[$num];
        if($num == 2 and ($path == "" or $path == "index" or $path == "index.php")){
            $path = "items";
        }
        echo "  <div class=\"content__filter\">";
        echo "      <div class=\"filter column column--center\">";
        echo "        <ul class=\"filter__title-list row\">";
        echo "            <a href=\"items\"><li class=\"filter__list-item\">Все</li></a>";
        echo "            <a href=\"films\"><li class=\"filter__list-item\">Фильмы</li></a>";
        echo "            <a href=\"serials\"><li class=\"filter__list-item\">Сериалы</li></a>";
        echo "        </ul>";
        echo "        <div class=\"filter__grid\">";
        foreach($database_response as $value){
            echo "           <a href={$path}?category={$value['id']}>";
            echo "            <div class=\"filter__grid-cell row\">";
            echo "                <img class=\"filter__grid-img\" src=\"{$value['icon']}\" alt=\"\">";
            echo "                <p class=\"filter__grid-text\">{$value['name']}</p>";
            echo "            </div>";
            echo "           </a>";
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
            echo "<a class=\"pages__number\" href=\"?page={$i}\">{$page_num}</a>";
        }
        echo "  </div>";
        echo "</div>";
        $category_id = 1;   
    }
    public static function viewFilm($database_response){
        $last_url = "./";
        if(isset($_SERVER['HTTP_REFERER']) and $_SERVER['HTTP_REFERER']!="") $last_url = $_SERVER['HTTP_REFERER'];
        echo "<div class=\"item-player column\">";
        echo    "<div class=\"item-player__header row\">";
        echo        "<div class=\"item-player__image-box\">";
        echo            "<img class=\"content__item-img\" src=\"images/{$database_response['image']}\" alt=\"\">";
        echo        "</div>";
        echo        "<div class=\"content__item-data column\">";
        echo            "<h1 class=\"content__item-title\">{$database_response['title']}</h1>";
        echo            "<div class=\"content__item-rating\">{$database_response['rating']}</div>";
        echo            "<p class=\"content__item-year\">{$database_response['year']}</p>";
        echo            "<p class=\"content__item-description\">{$database_response['description']}</p>";
        echo            "<a class=\"content__item-more-btn\" href=\"{$last_url}\">Назад</a>";
        echo        "</div>";
        echo    "</div>";
        echo    "<div class=\"item-player__video-box\">";
        echo        "<iframe class=\"item-player__video\" src=\"{$database_response['source']}\"></iframe>";
        echo    "<div>";
        echo "<div>";
    }
    public static function viewSeasons($database_response){
        echo "<div class=\"content__item grid\">";
        for($i=0;$i<count($database_response);$i++){           
            echo    "<a href=\"{$_SERVER['REQUEST_URI']}&season={$database_response[$i]['number']}\" class=\"grid-cell\">";
            echo         "<img class=\"content__item-img\" src=\"images/{$database_response[$i]['image']}\">";
            echo         "<h2 class=\"content__item-title\">Сезон {$database_response[$i]['number']}</h2>";
            echo    "</a>";
        }
        echo "<a class=\"content__item-more-btn\" href=\"".Functions::getUrl()."\">Назад</a>";
    }
    public static function viewSerias($database_response){
        echo "<div class=\"content__item grid\">";
        for($i=0;$i<count($database_response);$i++){      
            $seria_title = $database_response[$i]['title']!=null ? $database_response[$i]['title']:"Серия {$database_response[$i]['number']}";  
            echo    "<a href=\"{$_SERVER['REQUEST_URI']}&seria={$database_response[$i]['number']}\" class=\"grid-cell\">";
            echo         "<img class=\"content__item-img\" src=\"images/{$database_response[$i]['image']}\">";
            echo         "<h2 class=\"content__item-title\">{$seria_title}</h2>";
            echo    "</a>";
        }
        echo "<a class=\"content__item-more-btn\" href=\"./\">Назад</a>";
    }
    public static function viewSeria($database_response){
        $last_url = "./";
        if(isset($_SERVER['HTTP_REFERER']) and $_SERVER['HTTP_REFERER']!="") $last_url = $_SERVER['HTTP_REFERER'];
        echo "<div class=\"item-player column\">";
        echo    "<div class=\"item-player__header row\">";
        echo        "<div class=\"item-player__image-box\">";
        echo            "<img class=\"content__item-img\" src=\"images/{$database_response['image']}\" alt=\"\">";
        echo        "</div>";
        echo        "<div class=\"content__item-data column\">";
        echo            "<h1 class=\"content__item-title\">{$database_response['title']}</h1>";
        echo            "<div class=\"content__item-rating\">{$database_response['rating']}</div>";
        echo            "<p class=\"content__item-description\">{$database_response['description']}</p>";
        echo            "<a class=\"content__item-more-btn\" href=\"{$last_url}\">Назад</a>";
        echo        "</div>";
        echo    "</div>";
        echo    "<div class=\"item-player__video-box\">";
        echo        "<iframe class=\"item-player__video\" src=\"{$database_response['source']}\"></iframe>";
        echo    "<div>";
        echo "<div>";
    }
    public static function viewCategories($database_response){
        foreach($database_response as $value){
            echo "<option class=\"categories__item\" value=\"".$value['name']."\">".$value['name']."</oprion>";
        }
    } 
}
?>

