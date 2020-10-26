<?php 
    ob_start();
    $last_url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"./";
?>    
        <div class="d-flex justify-content-center my-5">
            <div class="mr-5">
                <img class="" style="width:400px; height:600px;" src="images/<?php echo $database_response['image'] ?>" alt="">
            </div>
            <div class="d-flex flex-column align-self-center">
                <h1 class=""> <?php echo $database_response['title'] ?> </h1>
                <div class="flex-column">
<?php                
                    for($i=0; $i<$database_response['rating'];$i++){
                        echo "<img src=\"images/other/star.png\" style=\"height:20px; width:20px;\">";
                    }
                    for($i=$database_response['rating']; $i<10;$i++){
                        echo "<img src=\"images/other/starEmpty.png\" style=\"height:20px; width:20px;\">";
                    }
?>                    
                </div>
                <p class="mt-4"> <?php echo $database_response['description'] ?> </p>
                <a class="back_btn" href= "?id=<?php echo $_GET['id']?>&season=<?php echo $_GET['season']?>" >К списку серий</a>
            </div>
        </div>
        <iframe class="video-player" src="<?php echo $database_response['source'] ?>"></iframe>
        <div class="w-100 mt-5 d-flex flex-column">
<?php                
            for($i=0; $i<count($comments);$i++){
                View::comment($comments[$i]['id'], $comments[$i]['user_id'], $comments[$i]['user_name'], $comments[$i]['date'], $comments[$i]['text'], $comments[$i]['hidden'], "Seria");                          
            }
?>      
        </div>
        <form class="w-100 mt-5 d-flex flex-column" action="insertCommentSeria" method="POST">
            <input type="hidden" name="id" value="<?php echo $database_response['id']; ?>">
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
