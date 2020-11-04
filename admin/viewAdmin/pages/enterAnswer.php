<?php 
    ob_start();
    if(isset($_SESSION['user']) and !is_null($_SESSION['user']) and $_SESSION['user']['status']==2){   
        header("Location: dashboard");
    }
    else{
?>
        <form class="form container w-50 mt-5 flex-column align-items-center justify-content-center text-center" role="form" method="POST" action="enterAnswer">
            <div class="row mb-3 align-items-center">
                <div class="col"></div>
                <h2 class="col-8 mb-5">Вход</h2>
                <div class="col"></div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col"></div>
                    <h2 class="col-8 mb-5" style="color:red; font-size:0.9rem;"><?php echo "Неверно введены логин и/или пароль"; ?></h2>
                <div class="col"></div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col"></div>
                <input class="col-8 w-50 p-2" type="email" id="email" name="email" placeholder="E-mail" required>
                <div class="col"></div>
            </div>
            <div class="row mb-3 align-items-center">
                <div class="col"></div>
                <input class="col-8 w-50 p-2" type="password" id="password" name="password" placeholder="Пароль" required>
                <div class="col"></div>
            </div>
            <div class="row justify-content-center">
                <div class="row" style="width:60%">
                    <div class="col"></div> 
                    <input class="col-6 form__submit" type="submit" name="submit" value="Войти">  
                    <div class="col"></div>    
                </div>
            </div>
        </form>
<?php
    }
    $content = ob_get_clean();
    include 'viewAdmin/layout/emptyLayout.php' 
?>