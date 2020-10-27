<?php 
    ob_start();
    $count_items = 0;
    $item_in_row = 5;
?>
    <div class="container">
        <h2 class="align-self-start">Сезоны</h2> 
        <div class="row">
      
<?php
        foreach ($seasons as $season){          
?>
            <div class="col-md-2 flex-column mb-5" style="min-width:160px">
                <a class="d-flex flex-wrap scrollLock" href="?id=<?php echo $season['parent_id'] ?>&season=<?php echo $season['id'] ?>">
                    <img class="content__item-img" src="images/<?php echo $season['image'] ?>">    
                </a>
<?php            
                View::favoriteStar($season['id'], $season['type']);
?>        
                <a class="d-flex flex-wrap color-4 p-0 m-0 scrollLock" href="?id=<?php echo $season['parent_id'] ?>&season=<?php echo $season['id'] ?>">
                    <p class="color-4 p-0 m-0">Сезон <?php echo $season['number'] ?> </p>
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
    <a class="back_btn" href="serials">К списку сериалов</a>
<?php    
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
