<?php 
    if(!isset($films) or count($films) == 0){
        $films = null;
    }
    if(!isset($serials) or count($serials) == 0){
        $serials = null;
    }

    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $num = substr_count($host, '/');
    $path = explode('/',$host)[$num];
    if($num == 2 and ($path == "" or $path == "index" or $path == "index.php")){
        $path = "items";
    }
    $item_in_row = 5;


    ob_start();
//---------------------------------------------------------------FILTER 
?>    
        <div class="filter d-flex flex-column justify-content-center mb-5">
            <ul class="filter__title-list d-flex justify-content-center">
                <a href="items"><li class="filter__list-item">Все</li></a>
                <a href="films"><li class="filter__list-item">Фильмы</li></a>
                <a href="serials"><li class="filter__list-item">Сериалы</li></a>
            </ul>
        <div class="filter__grid justify-content-center verical-align-middle">
<?php
        foreach($categories as $value){
?>            
            <div class="filter__grid-cell row justify-content-center align-items-center px-4 py-3">
                <a href="<?php //echo $path ?>items?category=<?php echo $value['id'] ?>" class="filter__grid-text color-4 m-0"><?php echo $value['name'] ?></a>
            </div>
<?php            
        }
?>        
        </div>
    </div>
<?php

//---------------------------------------------------------------FILMS
    if(!is_null($films)){
        $count_items = 0;
?>        
        <div class="container">
            <h2 class="align-self-start">Фильмы</h2> 
            <div class="row">
<?php            
        foreach ($films as $item){                  
?>
            <div class="col-md-2 flex-column mb-5" style="min-width:160px;">
                <a class="d-flex flex-wrap scrollLock" href="films?id=<?php echo $item['id'] ?>">
                    <img class="content__item-img" src="images/<?php echo $item['image'] ?>">    
                </a>
                <div>
<?php            
                    View::favoriteStar($item['id'], $item['type']);
?>        
                    <a class="d-flex flex-wrap color-4 p-0 m-0 scrollLock" href="films?id=<?php echo $item['id'] ?>">
                        <p class="color-4 p-0 m-0"><?php echo $item['title'] ?></p>
                        <p class="color-3 p-0 m-0"><?php echo $item['year'] ?>, <?php echo $categories[$item['category_id']-1]['name'] ?></p>
                    </a>
                </div>
            </div>
<?php
                $count_items++;
                $count_items%=$item_in_row;
            }
            for ($count_items; $count_items < $item_in_row; $count_items++) {                 
                echo "<div class=\"col\"></div>";
            }
?>
            </div>
        </div>
<?php            
    }
//---------------------------------------------------------------SERIALS    
    if(!is_null($serials)){
        $count_items = 0;
?>       
        <div class="container">
            <h2 class="align-self-start">Сериалы</h2> 
            <div class="row">
<?php                      
            foreach ($serials as $item){  
                ?>
                <div class="col-md-2 flex-column mb-5" style="min-width:160px">
                    <a class="d-flex flex-wrap scrollLock" href="serials?id=<?php echo $item['id'] ?>">
                        <img class="content__item-img" src="images/<?php echo $item['image'] ?>">    
                    </a>
    <?php            
                    View::favoriteStar($item['id'], $item['type']);
    ?>        
                    <a class="d-flex flex-wrap color-4 p-0 m-0 scrollLock" href="serials?id=<?php echo $item['id'] ?>">
                        <p class="color-4 p-0 m-0"><?php echo $item['title'] ?></p>
                        <p class="color-3 p-0 m-0"><?php echo $item['year'] ?>, <?php echo $categories[$item['category_id']-1]['name'] ?></p>
                    </a>
                </div>
    <?php
                    $count_items++;
                    $count_items%=$item_in_row;
                }
                for ($count_items; $count_items < $item_in_row; $count_items++) {                 
                    echo "<div class=\"col\"></div>";
                }
?>
            </div>
        </div>
<?php         
    }
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
