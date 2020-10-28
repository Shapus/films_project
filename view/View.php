

<?php
class View{     

    //enter-registration-userName
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

    public static function favoriteButton($id, $type){
        $favoriteItem = array(
            'user_id' => isset($_SESSION['user']['id'])?$_SESSION['user']['id']:NULL,
            'item_id' => $id,
            'type' => $type
        );
        if(isset($_SESSION['favorites']) and in_array($favoriteItem, $_SESSION['favorites'])){
            echo "
            <form role=\"form\" method=\"POST\" action=\"deleteFavorite\" class=\"my-3\">
                <input type=\"hidden\" name=\"id\" value=\"{$id}\">
                <input type=\"hidden\" name=\"type\" value=\"{$type}\">
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
                <input type=\"hidden\" name=\"type\" value=\"{$type}\">
                <button class=\"d-flex justify-content-center align-content-center form__submit scrollLock\" onClick=\"javascript:this.form.submit();\">
                    <p class=\"mr-3 mb-0 d-flex justify-self-center align-self-center\" style=\"vertical-align: center;\">Добавить в избранное</p>  
                    <img src=\"images/other/starEmpty.png\" class=\"favorite-star favorite-star--big\">
                </button>                  
            </form>
            ";
        }
    }
}
?>

