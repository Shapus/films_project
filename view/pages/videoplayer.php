<?php 
    ob_start();
    $last_url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"./";
?>    
        <div class="d-flex justify-content-center my-5">
            <div class="mr-5">
                <img class="" style="width:400px; height:600px;" src="images/<?php echo $videoplayer['image'] ?>" alt="">
            </div>
            <div class="d-flex flex-column align-self-center">
                <div class="d-flex">
                    <h1 class=""> <?php echo $videoplayer['title'] ?> </h1>
<?php                   
                        View::favoriteButton($videoplayer['parent_id'], $videoplayer['type']);
?>                        
                </div>
                <div class="flex-column">
<?php                
                    for($i=0; $i<$videoplayer['rating'];$i++){
                        echo "<img src=\"images/other/star.png\" class=\"favorite-star\">";
                    }
                    for($i=$videoplayer['rating']; $i<10;$i++){
                        echo "<img src=\"images/other/starEmpty.png\" class=\"favorite-star\">";
                    }
?>                    
                </div>
                <p class="mt-4"> <?php echo $videoplayer['year'] ?> </p>
                <p class="mt-4"> <?php echo $videoplayer['description'] ?> </p>
<?php
                if($videoplayer['type'] == 1){
                    echo "<a class=\"back_btn\" href=\"films\">К списку фильмов</a>";
                }
                else{             
                    echo "
                    <a class=\"back_btn\" href=\"serials?id={$_GET['id']}&season={$_GET['season']}\">К списку сезонов</a>
                    <div class=\"row mt-5\">
                    ";
                    if($_GET['seria'] > 1){
                        $prevSeria = $_GET['seria'] - 1;
                        echo "<a class=\"col-4 form__submit text-center\" href=\"serials?id={$_GET['id']}&season={$_GET['season']}&seria={$prevSeria}\">&#8592;Предыдущая серия</a>";
                    }
                    else{
                        echo "<div class=\"col-4\"></div>";
                    }
                    echo "<div class=\"col-4\"></div>";
                    if($_GET['seria'] < $seriasCount['count(*)']){
                        $nextSeria = $_GET['seria'] + 1;
                        echo"<a class=\"col-4 form__submit text-center\" href=\"serials?id={$_GET['id']}&season={$_GET['season']}&seria={$nextSeria}\">Следующая серия&#8594;</a>";
                    }
                    else{
                        echo "<div class=\"col-4\"></div>";
                    }
                    echo "</div>"; 
                }
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
