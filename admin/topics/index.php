<?php include '../../app/include/header-admin.php'; 
include "../../app/controllers/topics.php"; ?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="button row">
                <a href="<?php echo "create.php"?>" class="col-2 btn btn-success">Добавить категорию</a>
                <span class="col-1"></span>
                <a href="<?php echo "index.php"?>" class="col-3 btn btn-warning">Редактировать категории</a>
            </div>
            <div class="row title-table">
                <h2>Управление категориями</h2>
                <div class="col-1">ID</div>
                <div class="col-5">Название</div>
                <div class="col-4">Редактировать и удалить</div>
            </div>
            <?php foreach ($topics as $key => $topic): ?> <!-- значение value(topic) можно найти в топикс.пхп и это функция SellectOne -->
            <div class="row post">
                <div class="id col-1"><?=$key + 1; ?></div>
                <div class="title col-5"><?=$topic['name'] ; ?></div>
                <div class="red col-2"><a href="edit.php?id=<?=$topic['id'];?>">Edit</a></div>
                <div class="del col-2"><a href="edit.php?del_id=<?=$topic['id'];?>">Delete</a></div>
            </div>
            <?php endforeach; ?>
        </div>   
    </div>
</div>
    <!-- блок main END -->
<?php include '../../app/include/footer-admin.php' ; ?>  
