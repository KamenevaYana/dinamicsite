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
                <h2>Создать категорию</h2>
            </div>
            <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
            </div>
                <form action="create.php" method="post">
                    <div class="col">
                        <input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Введите имя категории..." aria-label="Имя категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea name="description" class="form-control" id="content" rows="3"><?=$description;?></textarea>
                    </div>
                    <div class="col">
                        <button name="topic-create" class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</div>
    <!-- блок main END -->
<?php include '../../app/include/footer-admin.php' ; ?>  

