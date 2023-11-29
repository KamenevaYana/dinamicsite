<?php include '../../app/include/header-admin.php';
include "../../app/controllers/commentaries.php"; ?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="row title-table">
                <h2>Управление Комментариями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Текст</div>
                <div class="col-2">Автор</div>
                <div class="col-4">Управление</div>
            </div>
            <?php foreach ($commentsForAdm as $key => $comment): ?>
            <div class="row post">
                <div class="id col-1"><?=$comment['id'];?></div>
                <div class="title col-4"><?=mb_substr($comment['comment'], 0, 50, 'UTF-8') . '...' ?></div>
                <div class="author col-3"><?=$comment['email']; ?></div>
                <div class="red col-1"><a href="edit.php?id=<?=$comment['id'];?>">Edit</a></div>
                <div class="del col-1"><a href="edit.php?delete_id=<?=$comment['id'];?>">Delete</a></div>
                    <?php if($comment['status']): ?>
                <div class="status col-1"><a href="edit.php?publish=0&pub_id=<?=$comment['id'];?>">Опубликовано</a></div>
                    <?php else: ?>
                <div class="status col-1"><a href="edit.php?publish=1&pub_id=<?=$comment['id'];?>">Черновик</a></div>
                <?php endif ?>      
            </div>
            <?php endforeach; ?>
        </div>   
    </div>
</div>
    <!-- блок main END -->
<?php include '../../app/include/footer-admin.php' ; ?>  
