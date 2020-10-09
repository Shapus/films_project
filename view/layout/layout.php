<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/dist/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper container-fluid row flex-column align-items-center">
            <header class="header w-100 row justify-content-center">  
                <div class="header__inner container row justify-content-between">                 
                    <div class="menu">
                        <ul class="menu__list row justify-content-center align-items-center">
                            <div class="menu__dropbox">
                                <a class="menu__dropbtn-box" href="films">Фильмы</a>
                                <ul class="menu__drop-content">
                                    <a class="menu__item row justify-content-center align-items-center" href="">
                                        <li  class="menu__link row justify-content-center align-items-center">film_genre_1</li>
                                    </a>
                                    <a class="menu__item row justify-content-center align-items-center" href="">
                                        <li  class="menu__link row justify-content-center align-items-center">film_genre_2</li>
                                    </a>
                                    <a class="menu__item row justify-content-center align-items-center" href="">
                                        <li  class="menu__link row justify-content-center align-items-center">film_genre_3</li>
                                    </a>
                                </ul>
                            </div> 
                            <div class="menu__dropbox">
                                <a class="menu__dropbtn-box" href="serials">Сериалы</a>
                                <ul class="menu__drop-content">
                                    <a class="menu__item row justify-content-center align-items-center" href="">
                                        <li  class="menu__link row justify-content-center align-items-center">series_genre_1</li>
                                    </a>
                                    <a class="menu__item row justify-content-center align-items-center" href="">
                                        <li  class="menu__link row justify-content-center align-items-center">series_genre_2</li>
                                    </a>
                                    <a class="menu__item row justify-content-center align-items-center" href="">
                                        <li  class="menu__link row justify-content-center align-items-center">series_genre_3</li>
                                    </a>
                                </ul>
                            </div> 
                            <div class="menu__dropbox">
                                <a class="menu__dropbtn-box" href="#">О нас</a>
                            </div> 
                            <div class="menu__dropbox">
                                <a class="menu__dropbtn-box" href="#">Избранное</a>
                            </div> 
                        </ul>
                    
                    </div>
                    <div class="search_bow row align-items-center">
                        <input class="search-input" type="text">
                    </div>
                    <div class="registration row align-items-center">
                        <a href="">Войти </a>
                        &nbsp;/&nbsp;
                        <a href="registration"> Зарегистрироваться</a>
                    </div>
                </div>
            </header>
            <main class="main row justify-content-center"> 
                    <!--
                    <section class="favorites row">
                            <div class="container container--section-container container--favorites">
                                <div class="favorites__inner">
                                    <div class="favorites__item column column--center">
                                        <img class="favorites__img" src="images/no_img.jpg" alt="favorites_image_1">
                                        <div class="favorites__title">favorites_title_1akdagdkjaghdkjagksfhsgfkj,hzsgfkj,sgdfk,jhsgdkdg</div>
                                    </div>
                                    <div class="favorites__item column column--center">
                                        <img class="favorites__img" src="images/no_img.jpg" alt="favorites_image_2">
                                        <div class="favorites__title">favorites_title_2</div>
                                    </div>
                                    <div class="favorites__item column column--center">
                                        <img class="favorites__img" src="images/no_img.jpg" alt="favorites_image_3">
                                        <div class="favorites__title">favorites_title_3</div>
                                    </div>
                                    <div class="favorites__item column column--center">
                                        <img class="favorites__img" src="images/no_img.jpg" alt="favorites_image_4">
                                        <div class="favorites__title">favorites_title_4</div>
                                    </div>
                                    <div class="favorites__item column column--center">
                                        <img class="favorites__img" src="images/no_img.jpg" alt="favorites_image_5">
                                        <div class="favorites__title">favorites_title_5</div>
                                    </div>
                                </div>
                            </div>
                    </section>  
                    -->                               
                    <section class="content row flex-column align-items-center">
                        <?php 
                            if(isset($content)) echo $content;
                            else echo "<h1>Ups, no content!</h1>";
                        ?>
                    </section>
                    <!--
                    <section class="left-menu row">
                        <div class="container container--section-container container--left-menu">
                            <div class="left-menu__inner">
                                <div class="logo logo--left-menu row justify-content-center align-items-center">ЛОГОТИП</div>
                                <div class="registration column column--center" id="registrationForm">
                                    enter/registration form
                                    <img class="registration__img" src="images/no_img.jpg" alt="">
                                    <form class="registration__form" method="POST" action="">
                                        <input type="text" placeholder="Имя пользователя">
                                        <input type="password" placeholder="Пароль">
                                        <input type="submit" value="Войти">
                                    </form>                      
                                    <button onclick="registration()" class="registration__btn" id="registration_btn">Зарегистрироваться</button> 
                                    <a href="" class="registration__btn">Забыли пароль?</a>
                                </div>
                                <div class="genre-map row justify-content-center align-items-center">КАРТА ЖАНРОВ</div>
                            </div>
                        </div>
                    </section>  
                    -->     
            </main>
    </div>  <!--wrapper-->
</body>
</html>

                                