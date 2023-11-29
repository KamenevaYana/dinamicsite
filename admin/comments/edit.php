<?php include '../../app/include/header-admin.php';
include "../../app/controllers/commentaries.php";?>
    <!-- блок main START -->
<div class='container'>
<?php include '../../app/include/sidebar-admin.php'; ?>
        <div class='posts col-9'>
            <div class="row title-table">
                <h2>Редактирование комментария</h2>
            </div>
            <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                    <!-- Вывод массива с ошибками -->
                    <?php include "../../app/helps/errorinfo.php"; ?>
                </div>
                <form action="edit.php" method="post">
                <input value="<?=$id; ?>" name="id" type="hidden">
                    <div class="col">
                        <input value="<?=$email; ?>" readonly name="email" type="text" class="form-control" placeholder="Введите email...">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое комментария</label>
                        <textarea name="content" class="form-control" id="editor" placeholder="Введите ваш текст..." rows="6"><?=$text1;?></textarea>
                    </div>
                    <div class="form-check">
                        <?php if($pub) $checked = 'checked'; else $checked = '' ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" <?=$checked;?>>
                            <label class="form-check-label" for="flexCheckChecked">
                                Опубликовать
                            </label>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                        </label>                       
                    </div>
                    <div class="col col-6">
                        <button name="edit_comment" class="btn btn-primary" type="submit">Сохранить</button>
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
