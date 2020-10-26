

<?php
class View{     

    //------------------------------------------------------------------------------------------------------------------------- VIEW USER DATA
    //-------------------------------------------------------------------- in header enter/registration
    public static function viewHeaderEnter(){
        if(isset($_SESSION['user']) and !is_null($_SESSION['user'])){
            echo "
            <div class=\"registration col-2 d-flex align-items-center\">
                {$_SESSION['user']['name']}
                <a href=\"logout\" class=\"scrollLock\">Выйти</a>
            </div>
            ";
        }
        else{
            echo "
            <div class=\"registration col-2 d-flex align-items-center\">
                <a href=\"enter\" class=\"clearLock\">Войти</a>
                &nbsp;/&nbsp;
                <a href=\"registration\" class=\"clearLock\">Зарегистрироваться</a>
            </div>
            ";
        }
    }


    //favorite star item
    public static function favoriteStar__item($id){
        $favoriteItem = array(
            'item_id' => $id,
        );
        if(isset($_SESSION['favorites__item']) and in_array($favoriteItem, $_SESSION['favorites__item'])){
            echo "
                <form role=\"form\" method=\"POST\" action=\"deleteFavoriteItem\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"image\" src=\"images/other/star.png\" name=\"submit\" class=\"favorite-star favorite-star--fill scrollLock\">
                </form>
                ";
        }
        else{
            echo "
                <form role=\"form\" method=\"POST\" action=\"addFavoriteItem\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"image\" src=\"images/other/starEmpty.png\" name=\"submit\" class=\"favorite-star favorite-star--empty scrollLock\">
                </form>
                ";
        }
    }
        //favorite star season
        public static function favoriteStar__season($id){
            $favoriteItem = array(
                'season_id' => $id,
            );
            if(isset($_SESSION['favorites__season']) and in_array($favoriteItem, $_SESSION['favorites__season'])){
                echo "
                    <form role=\"form\" method=\"POST\" action=\"deleteFavoriteSeason\">
                        <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                        <input type=\"image\" src=\"images/other/star.png\" name=\"submit\" class=\"favorite-star favorite-star--fill scrollLock\">
                    </form>
                    ";
            }
            else{
                echo "
                    <form role=\"form\" method=\"POST\" action=\"addFavoriteSeason\">
                        <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                        <input type=\"image\" src=\"images/other/starEmpty.png\" name=\"submit\" class=\"favorite-star favorite-star--empty scrollLock\">
                    </form>
                    ";
            }
        }
    //favorite star seria
    public static function favoriteStar__seria($id){
        $favoriteItem = array(
            'seria_id' => $id,
        );
        if(isset($_SESSION['favorites__seria']) and in_array($favoriteItem, $_SESSION['favorites__seria'])){
            echo "
                <form role=\"form\" method=\"POST\" action=\"deleteFavoriteSeria\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"image\" src=\"images/other/star.png\" name=\"submit\" class=\"favorite-star favorite-star--fill scrollLock\">
                </form>
                ";
        }
        else{
            echo "
                <form role=\"form\" method=\"POST\" action=\"addFavoriteSeria\">
                    <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                    <input type=\"image\" src=\"images/other/starEmpty.png\" name=\"submit\" class=\"favorite-star favorite-star--empty scrollLock\">
                </form>
                ";
        }
    }
    public static function comment($id, $user_id, $user_name, $date, $text, $hidden, $type){
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
                    <form method=\"POST\" action=\"viewComment{$type}\">
                        <input type=\"hidden\" value=\"{$id}\" name=\"comment_id\">
                        <input type=\"submit\" class=\"scrollLock\" style=\"margin: auto; cursor:pointer\" value=\"Показать\">
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
                    <form method=\"POST\" action=\"hideComment{$type}\">
                        <input type=\"hidden\" value=\"{$id}\" name=\"comment_id\">
                        <input type=\"submit\" class=\"color-2 scrollLock\" style=\"margin: auto; cursor:pointer\" value=\"Скрыть\">
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
}
?>

