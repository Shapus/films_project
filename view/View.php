

<?php
class View{     

//============================================================================== ENTER_REGISTRATION_USERNAME BLOCK
    public static function viewHeaderEnter(){
        if(isset($_SESSION['user']) and !is_null($_SESSION['user'])){
            echo "
                {$_SESSION['user']['name']}&nbsp;
                <a href=\"logout\" class=\"clearLock\">Выйти</a>
            ";
        }
        else{
            echo "
                <a href=\"enter\" class=\"clearLock\">Войти</a>
                &nbsp;/&nbsp;
                <a href=\"registration\" class=\"clearlLock\">Зарегистрироваться</a>
            ";
        }
    }

//============================================================================== FAVORITE_STAR
    public static function favoriteStar($id){
        $favoriteItem = array(
            'user_id' => isset($_SESSION['user']['id'])?$_SESSION['user']['id']:NULL,
            'element_id' => $id,
        );
        if(isset($_SESSION['favorites']) and in_array($favoriteItem, $_SESSION['favorites'])){
            echo "
                <form role=\"form\" method=\"POST\" action=\"deleteFavorite\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"image\" src=\"images/other/star.png\" name=\"submit\" class=\"favorite-star favorite-star--fill scrollLock\">
                </form>
                ";
        }
        else{
            echo "
                <form role=\"form\" method=\"POST\" action=\"addFavorite\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"image\" src=\"images/other/starEmpty.png\" name=\"submit\" class=\"favorite-star favorite-star--empty scrollLock\">
                </form>
                ";
        }
    }

//============================================================================== FAVORITE_BUTTON    
    public static function favoriteButton($id){
        $favoriteItem = array(
            'user_id' => isset($_SESSION['user']['id'])?$_SESSION['user']['id']:NULL,
            'element_id' => $id,
        );
        if(isset($_SESSION['favorites']) and in_array($favoriteItem, $_SESSION['favorites'])){
            echo "
            <form role=\"form\" method=\"POST\" action=\"deleteFavorite\" class=\"my-3\">
                <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                <button class=\"d-flex justify-content-center align-content-center form__submit--focused scrollLock\" onClick=\"javascript:this.form.submit();\">
                    <p class=\"mr-3 mb-0 d-flex justify-self-center align-self-center\" style=\"vertical-align: center;\">В избранном</p>   
                    <img src=\"images/other/star.png\" class=\"favorite-star favorite-star--big\">
                </button>                          
            </form>
            ";
        }
        else{
            echo "
            <form role=\"form\" method=\"POST\" action=\"addFavorite\" class=\"my-3\">
                <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                <button class=\"d-flex justify-content-center align-content-center form__submit scrollLock\" onClick=\"javascript:this.form.submit();\">
                    <p class=\"mr-3 mb-0 d-flex justify-self-center align-self-center\" style=\"vertical-align: center;\">Добавить в избранное</p>  
                    <img src=\"images/other/starEmpty.png\" class=\"favorite-star favorite-star--big\">
                </button>                  
            </form>
            ";
        }
    }

//============================================================================== COMMENT
    public static function comment($id, $user_id, $user_name, $date, $text, $hidden){
        if($hidden){
            echo "
            <div class=\"d-flex comment\">
                <div class=\"d-flex flex-column bg-3 align-items-center\" style=\"min-width:150px\">   
                    <div class=\"d-flex flex-column justify-content-center\">
                        <p class=\"comment__data\">{$user_name}</p>
                        <p class=\"comment__data\">{$date}</p>
            ";
            if(isset($_SESSION['user']) && $user_id == $_SESSION['user']['id']){
                echo "
                    <form method=\"POST\" action=\"showComment\">
                        <input type=\"hidden\" value=\"{$id}\" name=\"comment_id\">
                        <input type=\"submit\" class=\"scrollLock back_btn back_btn--dark bg-3\" style=\"margin: auto; cursor:pointer\" value=\"Показать\">
                    </form>
                ";
            }
            echo "
                    </div>
                </div>
                <div class=\"comment__text w-100\" style=\"background:#eeeeee\">
                    <p class=\"\" style=\"color:grey;\">КОММЕНТАРИЙ СКРЫТ</p>
                </div>
            </div>
            ";
        }
        else{
            echo "
            <div class=\"d-flex comment\">
                <div class=\"d-flex flex-column bg-3 align-items-center\" style=\"min-width:150px\">   
                    <div class=\"d-flex flex-column justify-content-center\">
                        <p class=\"comment__data\">{$user_name}</p>
                        <p class=\"comment__data\">{$date}</p>
            ";
            if(isset($_SESSION['user']) && $user_id == $_SESSION['user']['id']){
                echo "
                    <form method=\"POST\" action=\"hideComment\">
                        <input type=\"hidden\" value=\"{$id}\" name=\"comment_id\">
                        <input type=\"submit\" class=\"scrollLock back_btn back_btn--dark bg-3\" style=\"margin: auto; cursor:pointer\" value=\"Скрыть\">
                    </form>
                ";
            }
            echo "
                    </div>
                </div>
                <div class=\"comment__text\">
                    <p class=\"\">{$text}</p>
                </div>
            </div>
            ";
        }
    }

//============================================================================== ITEM_IN_ROW
    public static function item($id, $link, $image, $title, $subtitle){
        echo"
        <div class=\"col-2 flex-column mb-5\" style=\"min-width:160px;\">
            <a class=\"d-flex flex-wrap scrollLock\" href=\"{$link}\">
                <img class=\"content__item-img\" src=\"images/{$image}\">    
            </a>
            <div>      
        ";  
                View::favoriteStar($id);  
        echo "   
                <a class=\"d-flex flex-wrap color-4 p-0 m-0 scrollLock\" href=\"{$link}\">
                    <p class=\"color-4 p-0 m-0\">{$title}</p>
                    <p class=\"color-3 p-0 m-0\">{$subtitle}</p>
                </a>
            </div>
        </div>
        ";
    }

//============================================================================== ITEM_ROW
    public static function itemRow($title, $elements, $item){
        if(is_null($elements) or empty($elements)){
            return;
        }
        $count_items = 0;      
        $item_in_row = 5;
        
        //open row
        echo " 
        <div class=\"container\">
            <h2 class=\"align-self-start\">{$title}</h2> 
            <div class=\"row\" style=\"height:300px\"> 
        ";       
        $ids= array();
        $i = 0;
        foreach ($elements as $element) {
            array_push($ids, $element['item_id']);
        }
        $items = Item::getParents($ids);
        //row inner
        foreach ($elements as $element){          
            $type = isset($_GET['type'])?$_GET['type']:0;
            $category = isset($_GET['category'])?"&category={$_GET['category']}":"";
            $link = "items?type={$type}{$category}";
            switch ($element['type']) {
                case 1:
                    foreach ($items as $parent) {
                        if($parent['id'] == $element['item_id']){
                            $parentItem = $parent;
                            break;
                        }
                    }
                    $link .= "&id={$element['item_id']}";
                    $subtitle = "{$_SESSION['categories'][$parentItem['category']-1]['name']}, {$parentItem['year']}";
                    break;
                case 2:
                    foreach ($items as $parent) {
                        if($parent['id'] == $element['item_id']){
                            $parentItem = $parent;
                            break;
                        }
                    }
                    $link .= "&id={$element['item_id']}";
                    $subtitle = "{$_SESSION['categories'][$parentItem['category']-1]['name']}, {$parentItem['year']}";
                    break;  
                case 3:
                    $link .= "&id={$element['item_id']}&season={$element['season_number']}";
                    $subtitle = "Сезон ".$element['season_number'];
                    break;
                case 4:
                    $link .= "&id={$element['item_id']}&season={$element['season_number']}&seria={$element['seria_number']}";
                    $subtitle = "Серия ".$element['seria_number'];
                    break;      
                default:
                    # code...
                    break;
            }
            View::item($element['id'], $link, $element['image'], $element['title'], $subtitle);
            $count_items++;
            $count_items%=$item_in_row;
        }
        for ($count_items; $count_items < $item_in_row; $count_items++) {                 
            echo "<div class=\"col\"></div>";
        }

        //close row
        echo "
            </div>
        </div>      
        ";   
    }

//============================================================================== RATING_STARS
    public static function rating($rating){
        for($i=0; $i<$rating;$i++){
            echo "<img src=\"images/other/star.png\" class=\"favorite-star\">";
        }
        for($i=$rating; $i<10;$i++){
            echo "<img src=\"images/other/starEmpty.png\" class=\"favorite-star\">";
        }
    }

//============================================================================== VIDEO_LINKS
    public static function videoLinks($type, $seriasAmount){
        $getType = isset($_GET['type'])?$_GET['type']:0;
        $category = isset($_GET['category'])?"&category={$_GET['category']}":"";
        $link = "items?type={$getType}{$category}";
        switch ($type) {
            case 1:
                echo "<a class=\"back_btn\" href=\"{$link}\">Назад</a>";
                break;
            case 4:
                echo "
                <a class=\"back_btn\" href=\"{$link}&id={$_GET['id']}&season={$_GET['season']}\">К списку серий</a>
                <div class=\"row mt-5\">
                ";
                if($_GET['seria'] > 1){
                    $prevSeria = $_GET['seria'] - 1;
                    echo "<a class=\"col-4 form__submit text-center\" href=\"{$link}&id={$_GET['id']}&season={$_GET['season']}&seria={$prevSeria}\">&#8592;Предыдущая серия</a>";
                }
                else{
                    echo "<div class=\"col-4\"></div>";
                }
                echo "<div class=\"col-4\"></div>";
                if($_GET['seria'] < $seriasAmount){
                    $nextSeria = $_GET['seria'] + 1;
                    echo"<a class=\"col-4 form__submit text-center\" href=\"{$link}&id={$_GET['id']}&season={$_GET['season']}&seria={$nextSeria}\">Следующая серия&#8594;</a>";
                }
                else{
                    echo "<div class=\"col-4\"></div>";
                }
                echo "</div>"; 
                break; 
        }
    }


//============================================================================== TOP NAVIGATION
    public static function navigationRow(){
        $type = isset($_GET['type'])?"{$_GET['type']}":"";
        $category = isset($_GET['category'])?"category={$_GET['category']}":"";
        $id = isset($_GET['id'])?"{$_GET['id']}":"";
        $season = isset($_GET['season'])?"{$_GET['season']}":"";
        $season = isset($_GET['seria'])?"{$_GET['seria']}":"";
        echo "
            <div class=\"row d-flex justify-content-start\">
                <a class=\"back_btn\" href=\"items\">Главная</a>
        ";
                if(isset($_GET['id'])){
                    echo "<p class=\"back_btn\" style=\"color:black\">&nbsp;&raquo;&nbsp;</p><a class=\"back_btn\" href=\"items?id={$_GET['id']}\">{$_SESSION['item_name']}</a>";
                }
                if(isset($_GET['id']) and isset($_GET['season'])){
                    echo "<p class=\"back_btn\" style=\"color:black\">&nbsp;&raquo;&nbsp;</p><a class=\"back_btn\" href=\"items?id={$_GET['id']}&season={$_GET['season']}\">{$_SESSION['season_name']}</a>";
                }
                if(isset($_GET['id']) and isset($_GET['season']) and isset($_GET['seria'])){
                    echo "<p class=\"back_btn\" style=\"color:black\">&nbsp;&raquo;&nbsp;</p><a class=\"back_btn\" href=\"items?id={$_GET['id']}&season={$_GET['season']}&seria={$_GET['seria']}\">{$_SESSION['seria_name']}</a>";
                }
        echo "
            </div>
        ";
    }
}
?>

