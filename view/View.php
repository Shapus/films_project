

<?php
$item_in_row = 5;
class View{     
    //------------------------------------------------------------------------------------------------------------------------- VIEW ITEMS
    //-------------------------------------------------------------------- all items
    public static function viewItems($database_response_films, $database_response_serials, $categories){
        global $item_in_row;

        //view films
        if(!is_null($database_response_films)){
           View::viewFilms($database_response_films, $categories);
        }
        if(!is_null($database_response_serials)){
            View::viewSerials($database_response_serials, $categories);
        }
    }

    //-------------------------------------------------------------------- film list
    public static function viewFilms($database_response_films, $categories){
        global $item_in_row;
        $count_items = 0;
        //view title
        echo "
            <div class=\"container\">
                <h2 class=\"align-self-start\">Фильмы</h2> 
                <div class=\"row\">
            ";  
                foreach ($database_response_films as $item){  
                    View::viewItemInGrid($item['type'], $item['id'], $item['image'], $item['title'], $item['year'], $categories[$item['category_id']-1]['name']);
                    $count_items++;
                    $count_items%=$item_in_row;
                }
                for ($count_items; $count_items < $item_in_row; $count_items++) { 
                    echo "<div class=\"col\"></div>";
                }
        echo "
                </div>
            </div>";
    }

    //-------------------------------------------------------------------- serial list
    public static function viewSerials($database_response_serials, $categories){
        global $item_in_row;
        $count_items = 0;
        //view title
        echo "
            <div class=\"container\">
                <h2 class=\"align-self-start\">Сериалы</h2> 
                <div class=\"row\">
            ";        
                foreach ($database_response_serials as $item){  
                    View::viewItemInGrid($item['type'], $item['id'], $item['image'], $item['title'], $item['year'], $categories[$item['category_id']-1]['name']);
                    $count_items++;
                    $count_items%=$item_in_row;
                }
        echo "
                </div>
            </div>";
    }
    //-------------------------------------------------------------------- view item
    public static function viewItemInGrid($linkType, $id, $image, $title, $year, $category){
        echo "
        <div class=\"col-md-2 flex-column\">
            <a class=\"d-flex flex-wrap\" href=\"{$linkType}?id={$id}\">
                <img class=\"content__item-img\" src=\"images/{$image}\">    
            </a>
            ";
        var_dump($_SESSION['favorites']);
        $favoriteItem = array(
            'item_id' => $id,
            'item_type' => $linkType
        );
        if(in_array($favoriteItem, $_SESSION['favorites'][0])){
            echo "
                <form role=\"form\" method=\"POST\" action=\"addFavorite\">
                    <input type=\"hidden\" name=\"favoriteData\" value=\"{$id},{$linkType}\">
                    <input type=\"image\" src=\"images/other/star.png\" name=\"submit\" style=\"height:20px; width:20px; margin-top:5px\">
                </form>
                <a class=\"d-flex flex-wrap color-4 p-0 m-0\" href=\"serials?id={$id}\">
                    <p class=\"color-4 p-0 m-0\">{$title}</p>
                    <p class=\"color-3 p-0 m-0\">{$year}, {$category}</p>
                </a>
            </div>
            ";
        }
        else{
            echo "
                <form role=\"form\" method=\"POST\" action=\"addFavorite\">
                    <input type=\"hidden\" name=\"favoriteData\" value=\"{$id},{$linkType}\">
                    <input type=\"image\" src=\"images/other/starEmpty.png\" name=\"submit\" style=\"height:20px; width:20px; margin-top:5px\">
                </form>
                <a class=\"d-flex flex-wrap color-4 p-0 m-0\" href=\"serials?id={$id}\">
                    <p class=\"color-4 p-0 m-0\">{$title}</p>
                    <p class=\"color-3 p-0 m-0\">{$year}, {$category}</p>
                </a>
            </div>
            ";
        }
    }






    //------------------------------------------------------------------------------------------------------------------------- VIEW FILTER
    //-------------------------------------------------------------------- filter
    public static function viewFilter($database_response){
        $host = explode('?', $_SERVER['REQUEST_URI'])[0];
        $num = substr_count($host, '/');
        $path = explode('/',$host)[$num];

        //set link type
        if($num == 2 and ($path == "" or $path == "index" or $path == "index.php")){
            $path = "items";
        }

        //filter header
        echo "
            <div class=\"filter d-flex flex-column justify-content-center mb-5\">
                <ul class=\"filter__title-list d-flex justify-content-center\">
                    <a href=\"items\"><li class=\"filter__list-item\">Все</li></a>
                    <a href=\"films\"><li class=\"filter__list-item\">Фильмы</li></a>
                    <a href=\"serials\"><li class=\"filter__list-item\">Сериалы</li></a>
                </ul>
            <div class=\"filter__grid justify-content-center verical-align-middle\">
            ";

        //filter body
        foreach($database_response as $value){
            //hovered categories icons
                //<div class=\"filter__grid-img filter__grid-img--main\" icon=\"{$value['icon']}\" style=\"background-image:url({$value['icon']})\"alt=\"\"></div>
                //<div class=\"filter__grid-img filter__grid-img--focused\" style=\"background-image:url({$value['icon_focused']})\"alt=\"\"></div>
            echo "
                <div class=\"filter__grid-cell row justify-content-center align-items-center px-4 py-3\">
                    <a href={$path}?category={$value['id']} class=\"filter__grid-text color-4 m-0\">{$value['name']}</a>
                </div>
                ";
        }
        echo "
                </div>
            </div>
            ";
    }





    //------------------------------------------------------------------------------------------------------------------------- VIEW ITEMS INNER CONTENT
    //-------------------------------------------------------------------- film
    public static function viewFilm($database_response){
        $last_url = isset($_SESSION['prev_url'])?$_SESSION['prev_url']:"./";
        echo "<div class=\"col-md-6 justify-content-center\">";
        echo    "<div class=\"\">";
        echo        "<div class=\"\">";
        echo            "<img class=\"\" src=\"images/{$database_response['image']}\" alt=\"\">";
        echo        "</div>";
        echo        "<div class=\"\">";
        echo            "<h1 class=\"\">{$database_response['title']}</h1>";
        echo            "<div class=\"\">{$database_response['rating']}</div>";
        echo            "<p class=\"\">{$database_response['year']}</p>";
        echo            "<p class=\"\">{$database_response['description']}</p>";
        echo            "<a class=\"\" href=\"{$last_url}\">Назад</a>";
        echo        "</div>";
        echo    "</div>";
        echo    "<div class=\"\">";
        echo        "<iframe class=\"video-player\" src=\"{$database_response['source']}\"></iframe>";
        echo    "<div>";
        echo "<div>";
    }

    //-------------------------------------------------------------------- seasons
    public static function viewSeasons($database_response){
        $last_url = isset($_SESSION['prev_url'])?$_SESSION['prev_url']:"./";

        //view title
        echo "
            <h2 class=\"align-self-start\">Сезоны</h2> 
            <div class=\"content__item row\">
            ";        

        foreach ($database_response as $season){  
            //view film item
            echo "
                <a href=\"season?id={$season['id']}\" class=\"col\">
                    <img class=\"content__item-img\" src=\"images/{$season['image']}\">
                    <p class=\"color-4 p-0 m-0\">Сезон {$season['number']}</p>
                </a>
                ";
        }
        echo "</div>";
        echo "<a class=\"content__item-more-btn\" href=\"{$last_url}\">Назад</a>";
    }
    //-------------------------------------------------------------------- serias
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
    //-------------------------------------------------------------------- seria
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
    //-------------------------------------------------------------------- category list
    public static function viewCategories($database_response){
        foreach($database_response as $value){
            echo "<option class=\"categories__item\" value=\"".$value['name']."\">".$value['name']."</option>";
        }
    } 




    //------------------------------------------------------------------------------------------------------------------------- VIEW REGISTRATION
    //-------------------------------------------------------------------- registration form
    public static function viewRegistrationForm($errors){
        echo "
            <form class=\"form container w-50 mt-5 flex-column align-items-center justify-content-center text-center\" role=\"form\" method=\"POST\" action=\"registrationAnswer\">
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <h2 class=\"col-8 mb-5\">Регистрация</h2>
                    <div class=\"col\"\"></div>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                        <h2 class=\"col-8 mb-5\" style=\"color:red; font-size:0.9rem;\">{$errors[4]}</h2>
                    <div class=\"col\"></div>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"text\" id=\"name\" name=\"name\" placeholder=\"Имя пользователя\" required>
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.9rem;\">{$errors[0]}</label>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"email\" id=\"email\" name=\"email\" placeholder=\"E-mail\" required>
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.9rem;\">{$errors[1]}</label>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"Пароль\" required>  
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.9rem;\">{$errors[2]}</label>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"password\" id=\"confirm\" name=\"confirm\" placeholder=\"Повторите пароль\" required>
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.9rem;\">{$errors[3]}</label>
                </div>
                <div class=\"row justify-content-center\">
                    <div class=\"row\" style=\"width:60%\">
                        <div class=\"col  d-flex justify-self-start align-self-center\">
                            <a href=\"./\" class=\" back_btn\">Назад</a>
                        </div>
                        <input class=\"col-6 form__submit\" type=\"submit\" name=\"submit\" value=\"Зарегистрироваться\">  
                        <div class=\"col\"></div>    
                    </div>
                    <div class=\"row\" style=\"width:60%\">
                    <div class=\"col mt-3\">
                        <a href=\"enter\" class=\"\">Уже есть аккаунт?</a> 
                    </div>    
                </div>
                </div>
            </form>
        ";
       
    }
    //-------------------------------------------------------------------- registration answer
    public static function viewRegistrationAnswer($control){
        if($control[0]){
            echo "
            <div class=\"col mt-5 text-center\">
                <h2 class=\"mb-4\">Пользователь успешно зарегистрирован</h2>
                <a href=\"./\" class=\"col back_btn \">На главную</a> 
            </div>
            ";
        }
        else{
            View::viewRegistrationForm($control[1]);
        }
    }
    //-------------------------------------------------------------------- enter form
    public static function viewEnterForm($noErrors){
        if(isset($_SESSION['user']) and !is_null($_SESSION['user'])){
            echo "
            <div class=\"col mt-5 text-center\">
                <h2 class=\"mb-4\">Вы вошли как {$_SESSION['user']['name']}</h2>
                <a href=\"./\" class=\"col back_btn \">На главную</a> 
            </div>
            ";
        }
        else{
            echo "
                <form class=\"form container w-50 mt-5 flex-column align-items-center justify-content-center text-center\" role=\"form\" method=\"POST\" action=\"enterAnswer\">
                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col\"></div>
                        <h2 class=\"col-8 mb-5\">Вход</h2>
                        <div class=\"col\"></div>
                    </div>
                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col\"></div>
                            <h2 class=\"col-8 mb-5\" style=\"color:red; font-size:0.9rem;\">";
                                if(!$noErrors){
                                    echo "Неверно введены логин и/или пароль";
                                }
            echo            "</h2>
                        <div class=\"col\"></div>
                    </div>
                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col\"></div>
                        <input class=\"col-8 w-50 p-2\" type=\"email\" id=\"email\" name=\"email\" placeholder=\"E-mail\" required>
                        <div class=\"col\"></div>
                    </div>
                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col\"></div>
                        <input class=\"col-8 w-50 p-2\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"Пароль\" required>
                        <div class=\"col\"></div>
                    </div>
                    <div class=\"row justify-content-center\">
                        <div class=\"row\" style=\"width:60%\">
                            <div class=\"col  d-flex justify-self-start align-self-center\">
                                <a href=\"./\" class=\" back_btn\">Назад</a>
                            </div> 
                            <input class=\"col-6 form__submit\" type=\"submit\" name=\"submit\" value=\"Войти\">  
                            <div class=\"col\"></div>    
                        </div>
                        <div class=\"row mt-3\" style=\"width:60%\">
                            <div class=\"col\">
                                <a href=\"registration\" class=\"\">Зарегистрироваться</a>
                            </div> 
                        </div>
                        <div class=\"row\" style=\"width:60%\">
                            <div class=\"col\">
                                <a href=\"#\" class=\"\">Забыли пароль?</a> 
                            </div>    
                        </div>
                    </div>
                </form>";
        }
    }
    //-------------------------------------------------------------------- enter answer
    public static function viewEnterAnswer(){
        if(isset($_SESSION['user']) and !is_null($_SESSION['user'])){   
            echo "
            <div class=\"col mt-5 text-center\">
                <h2 class=\"mb-4\">Вы вошли как {$_SESSION['user']['name']}</h2>
                <a href=\"./\" class=\"col back_btn \">На главную</a> 
            </div>
            ";
        }
        else{
            View::viewEnterForm(false);
        }
    }

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

}
?>

