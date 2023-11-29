<?php include 'app/include/header.php';
    include 'app/controllers/users.php' ; // именно этот файл, не db 
?>
<!-- FORM -->
    <div class="container reg_form">
        <form class="row justify-content-md-center" method="post" action="registration.php">
            <h2 class="text-center">Форма регистрации</h2>
            <div class="mb-3 col-12 col-md-4 err">
                <p><?=$errMsg?></p>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                <input name="login" value="<?=$login;?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                <input name="email" value="<?=$email;?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Введите электронную почту">
                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <label for="exampleInputPassword2" class="form-label">Пароль</label>
                <input name="secondpass" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
            </div>
            <div class="w-100"></div>
            <div class="mb-3 col-12 col-md-4">
                <button name="button-reg" type="submit" class="btn btn-success">Зарегестрироваться</button>
                <a href="log.php">Авторизоваться</a>
            </div>
        </form>
    </div>
    <!-- FORM END-->
    <?php include 'app/include/footer.php'; ?>