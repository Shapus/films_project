
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/dist/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/dropbox.js"></script>
    
    <title>
<?php 
        $secondaryTitle = "";
        if(isset($HTMLtitle)){
            $secondaryTitle = ' - '.$HTMLtitle;
        }
        echo "FoxFilm".$secondaryTitle; 
?>
    </title>
</head>
<body>
    <header class="d-flex justify-content-center">  
        <div class="row d-flex container">                 
            <div class="col-6">
                <ul class="d-flex align-items-center">
                    <div class="menu__dropbox">
                        <a class="menu__dropbtn-box" href="items?type=1">Фильмы</a>
                    </div> 
                    <div class="menu__dropbox">
                        <a class="menu__dropbtn-box" href="items?type=2">Сериалы</a>
                    </div> 
                    <div class="menu__dropbox">
                        <a class="menu__dropbtn-box" href="#">О нас</a>
                    </div> 
                    <div class="menu__dropbox">
                        <a class="menu__dropbtn-box" href="favorites">Избранное</a>
                    </div> 
                </ul>
            
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center">
                <input class="search-input" type="text">
            </div>
            <div class="col-3 d-flex align-items-center">
<?php
                View::viewHeaderEnter();
?>
            </div>
        </div>
    </header>
    <main class="row justify-content-center">     
        <section class="container d-flex flex-column align-items-center">
        <div class="link-row d-flex align-self-start">
<?php

            if(isset($_SESSION['mainLink'])){
                $_SESSION['mainLink__name'] = isset($_SESSION['mainLink__name'])?$_SESSION['mainLink__name']:"Главная";
                echo "<a href=\"{$_SESSION['mainLink']}\" class=\"scrollLock back_btn\" style=\"height:max-content\">{$_SESSION['mainLink__name']}</a>";
            }
            else{
                echo "<a href=\"./\" class=\"scrollLock back_btn\" style=\"height:max-content\">{$_SESSION['mainLink__name']}</a>";
            }
            if(isset($_SESSION['serialLink'])){
                echo "<p class=\"\" style=\"font-size:1.5rem\">&nbsp; &#187; &nbsp;</p>";
                echo "<a href=\"{$_SESSION['serialLink']}\" class=\"scrollLock back_btn\" style=\"height:max-content\">{$_SESSION['serialLink__name']}</a>";
            }

            if(isset($_SESSION['seasonLink'])){
                echo "<p class=\"\" style=\"font-size:1.5rem\">&nbsp; &#187; &nbsp;</p>";
                echo "<a href=\"{$_SESSION['seasonLink']}\" class=\"scrollLock back_btn\" style=\"height:max-content\">{$_SESSION['seasonLink__name']}</a>";
            }
            if(isset($_SESSION['videoLink'])){
                echo "<p class=\"\" style=\"font-size:1.5rem\">&nbsp; &#187; &nbsp;</p>";
                echo "<a href=\"{$_SESSION['videoLink']}\" class=\"scrollLock back_btn\" style=\"height:max-content\">{$_SESSION['videoLink__name']}</a>";
            }

?>            
        </div>
 <?php 
            if(isset($content)) echo $content;
            else echo "<h1>Ups, no content!</h1>";
?>
        </section>  
    </main>
    <footer class="">
    </footer>
</body>
</html>
<script src="js/scrollLock.js"></script>
                                