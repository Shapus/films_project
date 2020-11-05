<?php 
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
        foreach($_SESSION['categories'] as $category){
?>            
            <div class="filter__grid-cell row justify-content-center align-items-center px-4 py-3">
                <a href="<?php //echo $path ?>items?category=<?php echo $category['id'] ?>" class="filter__grid-text color-4 m-0"><?php echo $category['name'] ?></a>
            </div>
<?php            
        }
?>        
        </div>
    </div>
<?php
    View::itemRow('Фильмы', $films);   
    View::itemRow('Сериалы', $serials);
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
