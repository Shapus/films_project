

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


    //is favorite star
    public static function favoriteStar($id, $type){
        $favoriteItem = array(
            'item_id' => $id,
            'item_type' => $type
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
}
?>

