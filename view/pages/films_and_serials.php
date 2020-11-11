<?php 
    ob_start();
//---------------------------------------------------------------FILTER 
?>    
        <div class="filter d-flex flex-column justify-content-center mb-5">
            <div class="row d-flex justify-content-center">
                <a href="items?type=0" class="col-2 type-btn">Все</a>
                <a href="items?type=1" class="col-2 type-btn">Фильмы</a>
                <a href="items?type=2" class="col-2 type-btn">Сериалы</a>
            </div>
        <div class="filter__grid justify-content-center verical-align-middle">
<?php
        foreach($_SESSION['categories'] as $category){
            $type = isset($_GET['type'])?"type={$_GET['type']}&":"";
            $link = "items?{$type}category={$category['id']}";
?>            
            <div class="filter__grid-cell row justify-content-center align-items-center px-4 py-3">
                <a href="<?php echo $link; ?>" class="filter__grid-text color-4 m-0"><?php echo $category['name'] ?></a>
            </div>
<?php            
        }
?>        
        </div>
    </div>
<?php
    View::itemRow('Фильмы', $films, null);   
    View::itemRow('Сериалы', $serials, null);
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
