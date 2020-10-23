

<?php
class View{     

    //------------------------------------------------------------------------------------------------------------------------- VIEW USER DATA
    //-------------------------------------------------------------------- in header enter/registration
    public static function viewHeaderEnter(){
        if(isset($_SESSION['user']) and !is_null($_SESSION['user'])){
            echo "
            <div class=\"registration row align-items-center\">
                {$_SESSION['user']['name']}
                <a href=\"logout\">Выйти</a>
            </div>
            ";
        }
        else{
            echo "
            <div class=\"registration row align-items-center\">
                <a href=\"enter\">Войти </a>
                &nbsp;/&nbsp;
                <a href=\"registration\"> Зарегистрироваться</a>
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
}
?>

