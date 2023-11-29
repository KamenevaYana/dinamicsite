<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/dinamicsite/app/database/db.php";

$errMsg = '';
$id = '';
$name = '';
$description = '';
$topics = selectAll('topics');

// Код для формы создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    // запрос в БД
    if($name === ''|| $description === ''){
        $errMsg = 'Не все поля заполнены!';
    }elseif(mb_strlen($name, 'UTF8') < 2){
        $errMsg = 'Категория должна быть более двух символов';
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name) {
            $errMsg = 'Такая категория в базе есть';
        }else{
        $topic = [
        'name'=> $name,
        'description'=> $description,
    ];
    $id = insert('topics', $topic);  // отправка на сервер
    $topic = selectOne('topics', ['id'=> $id]);
    header('location: http://localhost/dinamicsite/admin/topics/index.php');
        } 
    }
}else{
    $name = ''; //при повторном вводе сохраняем введеные данные
    $description = ''; // + в html куске registrariom.php вставляем пхп код в атрибут value
}

// Редактирование категории edit
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id'=> $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
} // код выше позволяет при клике на edit подтянуть данные из базы и заполнить их на странице
// теперь пишем логику работы при нажатии на "обновить" в категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    // запрос в БД
    if($name === ''|| $description === ''){
        $errMsg = 'Не все поля заполнены!';
    }elseif(mb_strlen($name, 'UTF8') < 2){
        $errMsg = 'Категория должна быть более двух символов';
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name) {
            $errMsg = 'Такая категория в базе есть';
        }else{
        $topic = [
        'name'=> $name,
        'description'=> $description,
    ];
    $id = $_POST['id'];  // отправка на сервер
    $topic_id = update('topics', $id, $topic);
    header('location: http://localhost/dinamicsite/admin/topics/index.php');
        } 
    }
}

// Удаление категории edit

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location: http://localhost/dinamicsite/admin/topics/index.php');
}