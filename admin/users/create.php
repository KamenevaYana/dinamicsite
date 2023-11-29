<?php include '../../app/include/header-admin.php';
include "../../app/controllers/users.php"; ?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
        <div class="button row">
                <a href="<?php echo "create.php"?>" class="col-2 btn btn-success">Добавить пользователя</a>
                <span class="col-1"></span>
                <a href="<?php echo "index.php"?>" class="col-3 btn btn-warning">Управление пользователями</a>
            </div>
            <div class="row title-table">
                <h2>Создание пользователя</h2>
            </div>
            <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorinfo.php"; ?>
                </div>
                <form action="create.php" method="post">
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                        <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">
                    </div>

                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                        <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Введите электронную почту">
                    </div>

                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
                    </div>

                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Пароль</label>
                        <input name="secondpass" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
                    </div>
                    <input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Администратор
                        </label>
                    <div class="col">
                        <button name="create-user" class="btn btn-primary" type="submit">Создать</button>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</div>
    <!-- блок main END -->
<?php include '../../app/include/footer-admin.php' ; ?>  
