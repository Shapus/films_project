<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/dist/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper column">
        <div class="recent-slider">
            <div class="container container--recent-slider">
                <div class="recent-slider__inner">
                    <!-- There is a place for SlickSlider -->
                </div>
            </div>           
        </div>
        <header class="header">
            <div class="container container--header">
                <div class="header__inner">                    
                    <div class="header__top-line row row--center">
                        <div class="header__menu">
                            <div class="menu">
                                <ul class="menu__list row row--center">
                                    <div class="menu__dropbox">
                                        <div class="menu__dropbtn-box">
                                            <a class="menu__dropbtn" href="#">Фильмы</a>
                                        </div>
                                        <ul class="menu__drop-content">
                                            <li class="menu__item row row--center">
                                                <a href="" class="menu__link row row--center">film_genre_1</a>
                                            </li>
                                            <li class="menu__item row row--center">
                                                <a href="" class="menu__link row row--center">film_genre_2</a>
                                            </li>
                                            <li class="menu__item row row--center">
                                                <a href="" class="menu__link row row--center">film_genre_3</a>
                                            </li>
                                        </ul>
                                    </div> 
                                    <div class="menu__dropbox">
                                        <div class="menu__dropbtn-box">
                                            <a class="menu__dropbtn" href="#">Сериалы</a>
                                        </div>
                                        <ul class="menu__drop-content">
                                            <li class="menu__item row row--center">
                                                <a href="" class="menu__link row row--center">series_genre_1</a>
                                            </li>
                                            <li class="menu__item row row--center">
                                                <a href="" class="menu__link row row--center">series_genre_2</a>
                                            </li>
                                            <li class="menu__item row row--center">
                                                <a href="" class="menu__link row row--center">series_genre_3</a>
                                            </li>
                                        </ul>
                                    </div> 
                                    <div class="menu__dropbox">
                                        <div class="menu__dropbtn-box">
                                            <a class="menu__dropbtn" href="#">О нас</a>
                                        </div>
                                    </div> 
                                </ul>
                            </div>
                        </div>
                        <div class="header__search row row--center">
                            <div class="search_box search_box--header">
                                <input class="search_box__input search_box__input--header" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="container container--main">
                <div class="main__inner row">    
                    <section class="left-menu">
                        <div class="container container--section-container container--left-menu">
                            <div class="left-menu__inner">
                                <div class="logo logo--left-menu row row--center">ЛОГОТИП</div>
                                <div class="registration column column--center">
                                    <img class="registration__img" src="images/no_img.jpg" alt="">
                                    <form class="registration__form" method="POST" action="">
                                        <input type="text" placeholder="Имя пользователя">
                                        <input type="text" placeholder="Пароль">
                                        <input type="submit" value="Войти">
                                    </form>                      
                                    <a href="" class="registration__btn">Зарегистрироваться</a> 
                                    <a href="" class="registration__btn">Забыли пароль?</a>                   
                                </div>
                                <div class="genre-map row row--center">КАРТА ЖАНРОВ</div>
                            </div>
                        </div>
                    </section>    
                              
                    <section class="content">
                        <div class="container container--section-container container--content">
                            <div class="content__inner">
                            <?php 
				                if(isset($content)) echo $content;
                                else echo "<h1>Ups, no content!</h1>";
			                ?>
                            </div>
                        </div>
                    </section>
                    <section class="favorites row">
                        <div class="container container--section-container container--favorites">
                            <div class="favorites__inner">
                                <div class="favorites__item column column--center">
                                    <img class="favorites__img" src="images/no_img.jpg" alt="favorites_image_1">
                                    <div class="favorites__title">favorites_title_1\akdagdkjaghdk\jagksfhsgfkj,hzsgfkj,sgdfk,jhsgdkdg</div>
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
                </div> <!--main inner-->
            </div> <!--main container-->
        </main>
        <footer class="footer">
            <div class="container container--footer">
                <div class="footer__inner"></div>
            </div>
        </footer>
    </div>  <!--wrapper-->
</body>
</html>

                                