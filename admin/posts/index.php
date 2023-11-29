<?php include '../../app/include/header-admin.php';
include "../../app/controllers/posts.php"; ?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="button row">
                <a href="<?php echo "create.php"?>" class="col-2 btn btn-success">Создать пост</a>
                <span class="col-1"></span>
                <a href="<?php echo "index.php"?>" class="col-3 btn btn-warning">Редактировать</a>
            </div>
            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Название</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($postsAdm as $key => $post): ?>
            <div class="row post">
                <div class="id col-1"><?=$key + 1;?></div>
                <div class="title col-5"><?=mb_substr($post['title'], 0, 50, 'UTF-8') . '...' ?></div>
                <div class="author col-2"><?=$post['user_name']; ?></div>
                <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">Edit</a></div>
                <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">Delete</a></div>
                    <?php if($post['status']): ?>
                <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">Опубликовано</a></div>
                    <?php else: ?>
                <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Черновик</a></div>
                <?php endif ?>      
            </div>
            <?php endforeach; ?>
        </div>   
    </div>
</div>
    <!-- блок main END -->
<?php include '../../app/include/footer-admin.php' ; ?>  
