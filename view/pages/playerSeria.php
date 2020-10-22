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
<?php        
    $content = ob_get_clean();
    include_once 'view/layout/layout.php';
?>
