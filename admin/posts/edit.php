<?php include '../../app/include/header-admin.php';
include "../../app/controllers/posts.php";?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="row title-table">
                <h2>Редактирование записи</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorinfo.php"; ?>
                </div>
                <form action="edit.php" method="post" enctype="multipart/form-data">
                <input value="<?=$id; ?>" name="id" type="hidden">
                    <div class="col">
                        <input value="<?=$post['title']; ?>" name="title" type="text" class="form-control" placeholder="Введите название статьи...">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое записи</label>
                        <textarea name="content" class="form-control" id="editor" placeholder="Введите ваш текст..." rows="6"><?=$post['content']; ?></textarea>
                    </div>
                    <div class="input-group col">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div>
                    <select name="topic" class="form-select" aria-label="Default select example">
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check">
                        <?php if(empty($publish) && $publish == 0): ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Опубликовать
                        </label>
                        <?php else: ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                В черновик
                        </label>
                        <?php endif; ?>                            
                    </div>
                    <div class="col col-6">
                        <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
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
