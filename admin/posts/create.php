<?php include '../../app/include/header-admin.php';
include "../../app/controllers/posts.php";?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="button row">
                <a href="<?php echo "create.php"?>" class="col-2 btn btn-success">Добавить пост</a>
                <span class="col-1"></span>
                <a href="<?php echo "index.php"?>" class="col-3 btn btn-warning">Редактировать посты</a>
            </div>
            <div class="row title-table">
                <h2>Добавление записи</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorinfo.php"; ?>
                </div>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col">
                        <input value="<?=$title; ?>" name="title" type="text" class="form-control" placeholder="Введите название статьи...">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое записи</label>
                        <textarea name="content" class="form-control" id="editor" placeholder="Введите ваш текст..." rows="6"><?=$content; ?></textarea>
                    </div>
                    <div class="input-group col">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div>
                    <select name="topic" class="form-select" aria-label="Default select example">
                        <option selected>Категория поста</option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check">
                        <input name="publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать
                        </label>
                    </div>
                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Добавить запись</button>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</div>
    <!-- блок main END -->
    <!-- добавление визуального редактора к тестовому полю -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script src="../../assets/js/js.js"></script>
<?php include '../../app/include/footer-admin.php' ; ?>  
