

<?php
$item_in_row = 10;
class View{     
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


    public static function viewSerials($database_response_serials, $categories){
        global $item_in_row;

        //view title
        echo "
            <h2 class=\"align-self-start\">Сериалы</h2> 
            <div class=\"content__item container row justify-contetn-center\">
            ";        
        foreach ($database_response_serials as $serial){  

            //view film item
            echo "
                <a href=\"serials?id={$serial['id']}\" class=\"col\">
                    <img class=\"content__item-img\" src=\"images/{$serial['image']}\">
                    <p class=\"color-4 p-0 m-0\">{$serial['title']}</p>
                    <p class=\"color-3\">{$serial['year']}, {$categories[$serial['category_id']-1]['name']}</p>
                </a>
                ";
        }
        echo "</div>";
    }


    public static function viewFilms($database_response_films, $categories){
        global $item_in_row;

        //view title
        echo "
            <h2 class=\"align-self-start\">Фильмы</h2> 
            <div class=\"content__item container row justify-contetn-center\">
            ";  
            
        foreach ($database_response_films as $film){  

            //view film item
        echo "
            <a href=\"films?id={$film['id']}\" class=\"col\">
                <img class=\"content__item-img\" src=\"images/{$film['image']}\">
                <p class=\"color-4 p-0 m-0\">{$film['title']}</p>
                <p class=\"color-3\">{$film['year']}, {$categories[$film['category_id']-1]['name']}</p>
            </a>
            ";
        }
        echo "</div>";
    }


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
                <a href={$path}?category={$value['id']} class=\"filter__grid-cell row justify-content-center align-items-center px-4 py-3\">
                    <div>
                        
                        <p class=\"filter__grid-text color-4 m-0\">{$value['name']}</p>
                    </div>
                </a>
                ";
        }
        echo "
                </div>
            </div>
            ";
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
            echo "<option class=\"categories__item\" value=\"".$value['name']."\">".$value['name']."</option>";
        }
    } 


    public static function viewRegistrationForm($errors){
        echo "
            <form class=\"form container w-50 mt-5 flex-column align-items-center justify-content-center text-center\" role=\"form\" method=\"POST\" action=\"registrationAnswer\">
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <h2 class=\"col-8 mb-5\">Регистрация</h2>
                    <div class=\"col\"></div>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"text\" id=\"name\" name=\"name\" placeholder=\"Имя пользователя\" required>
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.8rem;\">{$errors[0]}</label>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"email\" id=\"email\" name=\"email\" placeholder=\"E-mail\" required>
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.8rem;\">{$errors[1]}</label>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"Пароль\" required>  
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.8rem;\">{$errors[2]}</label>
                </div>
                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col\"></div>
                    <input class=\"col-8 w-50 p-2\" type=\"password\" id=\"confirm\" name=\"confirm\" placeholder=\"Повторите пароль\" required>
                    <label class=\"col p-0 m-0\" style=\"color:red; font-size:0.8rem;\">{$errors[3]}</label>
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
                        <a href=\"#\" class=\"\">Уже есть аккаунт?</a> 
                    </div>    
                </div>
                </div>
            </form>
        ";
       
    }
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
            print_r($control[1]);
            View::viewRegistrationForm($control[1]);
        }
    }

    public static function viewEnterForm(){
        echo "
            <form class=\"form container w-50 mt-5 flex-column align-items-center justify-content-center text-center\" role=\"form\" method=\"POST\" action=\"registrationAnswer\">
            <div class=\"row mb-3 align-items-center\">
                <div class=\"col\"></div>
                <h2 class=\"col-8 mb-5\">Вход</h2>
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
?>

