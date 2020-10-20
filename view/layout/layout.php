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
    <header class="d-flex justify-content-center">  
        <div class="row container justify-content-between">                 
            <div class="menu">
                <ul class="menu__list row justify-content-center align-items-center">
                    <div class="menu__dropbox">
                        <a class="menu__dropbtn-box" href="films">Фильмы</a>
                        <ul class="menu__drop-content">
                            <a class="menu__item" href="">film_genre_1</a>
                            <a class="menu__item" href="">film_genre_2</a>
                            <a class="menu__item" href="">film_genre_3</a>
                        </ul>
                    </div> 
                    <div class="menu__dropbox">
                        <a class="menu__dropbtn-box" href="serials">Сериалы</a>
                        <ul class="menu__drop-content">
                            <a class="menu__item col" href="">series_genre_1</a>
                            <a class="menu__item col" href="">series_genre_2</a>
                            <a class="menu__item col" href="">series_genre_3</a>
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
            <?php
                View::viewHeaderEnter();
            ?>
        </div>
    </header>
    <main class="row justify-content-center">                             
            <section class="container d-flex flex-column align-items-center">
                <?php 
                    if(isset($content)) echo $content;
                    else echo "<h1>Ups, no content!</h1>";
                ?>
            </section>  
    </main>
</body>
</html>

                                