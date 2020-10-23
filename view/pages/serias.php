<?php 
    ob_start();
    $count_items = 0;
    $item_in_row = 5;
?>
    <div class="container">
        <h2 class="align-self-start">Серии</h2> 
        <div class="row">
      
<?php
        foreach ($database_response as $seria){    
            $seria_title = $seria['title']!=null ? $seria['title']:"Серия {$seria['number']}";      
?>
            <div class="col-md-2 flex-column mb-5" style="min-width:160px">
                <a class="d-flex flex-wrap scrollLock" href="<?php echo $_SERVER['REQUEST_URI'] ?>&seria=<?php echo $seria['number'] ?>">
                    <img class="content__item-img" src="images/<?php echo $seria['image'] ?>">    
                </a>
<?php            
                View::favoriteStar__seria($seria['id']);
?>        
                <a class="d-flex flex-wrap color-4 p-0 m-0 scrollLock" href="<?php echo $_SERVER['REQUEST_URI'] ?>&seria=<?php echo $seria['number'] ?>">
                    <p class="color-4 p-0 m-0"><?php echo $seria_title ?> </p>
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
    <a class="back_btn" href="serials?id=<?php echo $_GET['id'] ?>">К списку сезонов</a>
<?php    
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
