<?php ob_start(); ?>
    <form class="form container w-50 mt-5 flex-column align-items-center justify-content-center text-center" role="form" method="POST" action="registrationAnswer">
                <div class="row mb-3 align-items-center">
                    <div class="col"></div>
                    <h2 class="col-8 mb-5">Регистрация</h2>
                    <div class="col"></div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col"></div>
                        <h2 class="col-8 mb-5" style="color:red; font-size:0.9rem;"></h2>
                    <div class="col"></div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col"></div>
                    <input class="col-8 w-50 p-2" type="text" id="name" name="name" placeholder="Имя пользователя" required>
                    <label class="col p-0 m-0" style="color:red; font-size:0.9rem;"></label>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col"></div>
                    <input class="col-8 w-50 p-2" type="email" id="email" name="email" placeholder="E-mail" required>
                    <label class="col p-0 m-0" style="color:red; font-size:0.9rem;"></label>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col"></div>
                    <input class="col-8 w-50 p-2" type="password" id="password" name="password" placeholder="Пароль" required>  
                    <label class="col p-0 m-0" style="color:red; font-size:0.9rem;"></label>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col"></div>
                    <input class="col-8 w-50 p-2" type="password" id="confirm" name="confirm" placeholder="Повторите пароль" required>
                    <label class="col p-0 m-0" style="color:red; font-size:0.9rem;"></label>
                </div>
                <div class="row justify-content-center">
                    <div class="row" style="width:60%">
                        <div class="col  d-flex justify-self-start align-self-center">
                            <a href="./" class="back_btn">Назад</a>
                        </div>
                        <input class="col-6 form__submit" type="submit" name="submit" value="Зарегистрироваться">  
                        <div class="col"></div>    
                    </div>
                    <div class="row" style="width:60%">
                    <div class="col mt-3">
                        <a href="enter" class="">Уже есть аккаунт?</a> 
                    </div>    
                </div>
                </div>
            </form>
<?php
	$content = ob_get_clean();
	include_once 'view/layout/emptyLayout.php';
?>
