<?php include '../../app/include/header-admin.php';
include '../../app/controllers/users.php'; ?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="button row">
                <a href="create.php" class="col-2 btn btn-success">Добавить пользователя</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление пользователями</a>
            </div>
            <div class="row title-table">
                <h2>Пользователями</h2>
                <div class="col-1">ID</div>
                <div class="col-2">Логин</div>
                <div class="col-3">Email</div>
                <div class="col-2">Роль</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($users as $key => $user): ?>
            <div class="row post">
            <div class="col-1"><?=$user['id']?></div>
                <div class="col-2"><?=$user['user_name']?></div>
                <div class="col-3"><?=$user['email']?></div>
                <?php if($user['admin'] == 1): ?>
                <div class="col-2">Админ</div>
                <?php else: ?>
                <div class="col-2">Пользователь</div>
                <?php endif; ?>   
                <div class="red col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">Edit</a></div>
                <div class="del col-2"><a href="index.php?delete_id=<?=$user['id'];?>">Delete</a></div>
            </div>
            <?php endforeach; ?>
        </div>   
    </div>
</div>
    <!-- блок main END -->
<?php include '../../app/include/footer-admin.php' ; ?>  
