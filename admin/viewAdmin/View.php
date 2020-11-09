

<?php
class View{     

    //enter-registration-userName
    public static function viewHeaderEnter(){
        if(isset($_SESSION['user']) and !is_null($_SESSION['user'])){
            echo "
                {$_SESSION['user']['name']}
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


    //favorite star item
    public static function favoriteStar($id, $type){
        $favoriteItem = array(
            'user_id' => isset($_SESSION['user']['id'])?$_SESSION['user']['id']:NULL,
            'item_id' => $id,
            'type' => $type
        );
        if(isset($_SESSION['favorites']) and in_array($favoriteItem, $_SESSION['favorites'])){
            echo "
                <form role=\"form\" method=\"POST\" action=\"deleteFavorite\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"hidden\" name=\"type\" value=\"{$type}\">
                    <input type=\"image\" src=\"images/other/star.png\" name=\"submit\" class=\"favorite-star favorite-star--fill scrollLock\">
                </form>
                ";
        }
        else{
            echo "
                <form role=\"form\" method=\"POST\" action=\"addFavorite\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"hidden\" name=\"type\" value=\"{$type}\">
                    <input type=\"image\" src=\"images/other/starEmpty.png\" name=\"submit\" class=\"favorite-star favorite-star--empty scrollLock\">
                </form>
                ";
        }
    }

    //comment
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

    public static function adminItem($item){
         switch ($item['type']) {
            case 1:
                $type = "Фильм";  
                break;
            case 2:
                $type = "Сериал";
                break;
            case 3:
                $type = "Сезон";
                break;
            case 4:
                $type = "Серия";
                break;
            default:
                $type = "Нет типа";
        }
        $category = $_SESSION['categories'][$item['category_id']-1]['name'];
        $title = $item['title'];
        $image = "images/".$item['image'];
        $rating = $item['rating'];
        $number = $item['number'];
        $year = $item['year'];
        echo "
            <div class=\"row admin-item\">
                <img class=\"col\" src={$image}>
                <div class=\"col\">{$type}</div>
                <div class=\"col\">{$title}</div>
                <div class=\"col\">{$category}</div>
                <div class=\"col\">{$rating}</div>
                <div class=\"col\">{$number}</div>
                <div class=\"col\">{$year}</div>
            </div>
        ";
    }
    public static function adminItemRow($items){
        echo "<div class=\"col\">";
        foreach ($items as $item) {
            View::adminItem($item);
        }
    }
}
?>

