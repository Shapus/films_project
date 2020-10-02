

<?php
$item_on_page = 10;
class View{  
    public static function viewItems($database_response, $categories){
        global $item_on_page;
        $page = 0;
        if(isset($_GET['page'])) $page = $_GET['page'];
        $i = 0;
        $current_item = $page*$item_on_page+$i;
        $_SESSION['prev_url'] = $_SERVER['REQUEST_URI'];
        echo "<div class=\"content__item container row justify-contetn-center\">";
        while($i<$item_on_page and count($database_response)>$current_item) {  
            $type = 'films';
            
            if($database_response[$current_item]['is_serial'] == 1) $type = 'serials';     
            echo    "<a href=\"".$type."?id={$database_response[$current_item]['id']}\" class=\"col-md-2\">";
            echo         "<img class=\"content__item-img\" src=\"images/{$database_response[$current_item]['image']}\">";
            echo         "<p class=\"color-4 p-0 m-0\">{$database_response[$current_item]['title']}</p>";
            echo         "<p class=\"color-3\">{$database_response[$current_item]['year']}, {$categories[$database_response[$current_item]['category_id']-1]['name']}</p>";
            echo    "</a>";
            $i++;
            $current_item = $page*$item_on_page+$i;
        }
        echo "</div>";
    }
    public static function viewFilter($database_response){
        $host = explode('?', $_SERVER['REQUEST_URI'])[0];
        $num = substr_count($host, '/');
        $path = explode('/',$host)[$num];
        if($num == 2 and ($path == "" or $path == "index" or $path == "index.php")){
            $path = "items";
        }
        echo "      <div class=\"filter d-flex flex-column justify-content-center mb-5\">";
        echo "        <ul class=\"filter__title-list d-flex justify-content-center\">";
        echo "            <a href=\"items\"><li class=\"filter__list-item\">Все</li></a>";
        echo "            <a href=\"films\"><li class=\"filter__list-item\">Фильмы</li></a>";
        echo "            <a href=\"serials\"><li class=\"filter__list-item\">Сериалы</li></a>";
        echo "        </ul>";
        echo "        <div class=\"filter__grid justify-content-center verical-align-middle\">";
        foreach($database_response as $value){
            echo "           <a href={$path}?category={$value['id']} class=\"filter__grid-cell row justify-content-center align-items-center px-4 py-3\">";
            echo "            <div>";
            //echo "                <div class=\"filter__grid-img filter__grid-img--main\" icon=\"{$value['icon']}\" style=\"background-image:url({$value['icon']})\"alt=\"\"></div>";
            //echo "                <div class=\"filter__grid-img filter__grid-img--focused\" style=\"background-image:url({$value['icon_focused']})\"alt=\"\"></div>";
            echo "                <p class=\"filter__grid-text color-4 p-0 m-0\">{$value['name']}</p>";
            echo "            </div>";
            echo "           </a>";
        }
        echo "        </div>";
        echo "      </div>";
    }
    public static function viewPagesNumbers($database_response){
        global $item_on_page;
        echo "<div class=\"pages row\">";
        for($i=0;$i<count($database_response)/$item_on_page;$i++){
            $page_num = $i+1;
            echo "<a class=\"pages__number d-flex justify-content-center\" href=\"?page={$i}\">{$page_num}</a>";
        }
        echo "</div>";
        $category_id = 1;   
    }
    public static function viewFilm($database_response){
        $last_url = isset($_SESSION['prev_url'])?$_SESSION['prev_url']:"./";
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
        $last_url = isset($_SESSION['prev_url'])?$_SESSION['prev_url']:"./";
        echo "<div class=\"content__item grid\">";
        for($i=0;$i<count($database_response);$i++){           
            echo    "<a href=\"{$_SERVER['REQUEST_URI']}&season={$database_response[$i]['number']}\" class=\"grid-cell\">";
            echo         "<img class=\"content__item-img\" src=\"images/{$database_response[$i]['image']}\">";
            echo         "<h2 class=\"content__item-title\">Сезон {$database_response[$i]['number']}</h2>";
            echo    "</a>";
        }
        echo "<a class=\"content__item-more-btn\" href=\"{$last_url}\">Назад</a>";
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
        echo "<a class=\"content__item-more-btn\" href=\"serials?id={$_GET['id']}\">К списку сезонов</a>";
    }
    public static function viewSeria($database_response){
        //echo "<ul class=\"row row--center\">";
        //echo    "<li><a href=\"/{$_SESSION['project_name']}?serial={$_SESSION['serial_id']}&season={$_SESSION['season_id']}\"></a></li>";
        echo "<div class=\"item-player column\">";
        echo    "<div class=\"item-player__header row\">";
        echo        "<div class=\"item-player__image-box\">";
        echo            "<img class=\"content__item-img\" src=\"images/{$database_response['image']}\" alt=\"\">";
        echo        "</div>";
        echo        "<div class=\"content__item-data column\">";
        echo            "<h1 class=\"content__item-title\">{$database_response['title']}</h1>";
        echo            "<div class=\"content__item-rating\">{$database_response['rating']}</div>";
        echo            "<p class=\"content__item-description\">{$database_response['description']}</p>";
        echo            "<a class=\"content__item-more-btn\" href=\"serials?id={$_GET['id']}&season={$_GET['season']}\">К списку серий</a>";
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
    public static function viewRegistrationForm(){
        echo "
            <div>
                <form class=\"column\" role=\"form\" method=\"POST\" action=\"registrationAnswer\"\">
                    <div class=\"input_box\">
                        <label class=\"\">Имя пользователя</label>
                        <input class=\"\" type=\"text\" id=\"name\" name=\"name\" required>
                    </div>
                    <div class=\"input_box\">
                        <label class=\"\">E-mail</label>
                        <input class=\"\" type=\"email\" id=\"email\" name=\"email\" required>
                    </div>
                    <div class=\"input_box\">
                        <label class=\"\">Пароль</label>
                        <input class=\"\" type=\"password\" id=\"password\" name=\"password\" required>
                    </div>
                    <div class=\"input_box\">
                        <label class=\"\">Повторите пароль</label>
                        <input class=\"\" type=\"password\" id=\"confirm\" name=\"confirm\" required>
                    </div>
                </form>
            </div>
        ";
       
    }
    public static function viewEnterForm(){
        echo "
            <img class=\"registration__img\" src=\"images/no_img.jpg\" alt=\"\">
                <form class=\"registration__form\" method=\"POST\" action=\"\">
                    <input type=\"text\" placeholder=\"Имя пользователя\">
                    <input type=\"password\" placeholder=\"Пароль\">
                    <input type=\"submit\" value=\"Войти\">
                </form>                      
            <button onclick=\"registration()\" class=\"registration__btn\">Зарегистрироваться</button> 
            <a href=\"\" class=\"registration__btn\">Забыли пароль?</a>
        ";
    }
}
?>

