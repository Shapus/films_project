<?php 
    ob_start();
?>    
        <div class="d-flex justify-content-center my-5">
            <div class="mr-5">
                <img class="" style="width:400px; height:600px;" src="images/<?php echo $element['image'] ?>" alt="">
            </div>
            <div class="d-flex flex-column align-self-center">
      
                <div class="flex-column">                
                    <h1 class=""> <?php echo $item['title'] ?> </h1> 
<?php                                
                    View::favoriteButton($videoplayer['parent_id'], $element['type']); 
                    View::rating($item['rating']);
?>                    
                </div>
                <p class="mt-4"> <?php echo $item['year'] ?> </p>
                <p class="mt-4"> <?php echo $videoplayer['description'] ?> </p>
<?php
                View::videoLinks($element['type'],$seriasCount);
?>                
            </div>
        </div>
        <iframe class="video-player" src="<?php echo $videoplayer['source'] ?>"></iframe>
        <div class="w-100 mt-5 d-flex flex-column">
<?php                
            for($i=0; $i<count($comments);$i++){
                View::comment($comments[$i]['id'], $comments[$i]['user_id'], $comments[$i]['user_name'], $comments[$i]['date'], $comments[$i]['text'], $comments[$i]['hidden'], "Item");                          
            }
?>      
        </div>
        <form class="w-100 mt-5 d-flex flex-column" action="insertComment" method="POST">
            <input type="hidden" name="videoplayer_id" value="<?php echo $videoplayer['id']; ?>">
            <div class="row w-100 border d-flex">
                <textarea class="form-control w-100" style="min-height:100px; resize: none;" type="text" name="comment_text" placeholder="Введите комментарий" maxLength=1000></textarea>
            </div>   
            <div class="row mt-3">
                <div class="col"></div>  
                <input class="col-6 form__submit scrollLock" type="submit" name="submit" value="Отправить">  
                <div class="col"></div>    
            </div>
        </form>
<?php        
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
