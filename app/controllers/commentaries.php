<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/dinamicsite/app/database/db.php';
$commentsForAdm = selectAll('comments');

$page = $_GET['post'];
$email = '';
$comment = '';
$errMsg = [];
$status = 0;
$comments = [];

// Код для создания комментария
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){
  
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);

    // запрос в БД
    if($email === ''|| $comment === ''){
        array_push($errMsg,"Не все поля заполнены!");
    }elseif(mb_strlen($comment, 'UTF8') < 50){
        array_push($errMsg,"Комментарий должен быть не менее 50 символов");
    }else{
        $user = selectOne ('users', ['email' => $email]);
        if($user['email'] == $email) {
            $status = 1;
        }
        $comment = [
        'status' => $status,
        'page'=> $page,
        'email'=> $email,
        'comment' => $comment,
    ];
    $comment = insert('comments', $comment);  // отправка на сервер
    $comments = selectAll('comments', ['page'=> $page, 'status' => 1]);
    }
}else{
    $email = '';
    $comment = '';
    $comments = selectAll('comments', ['page'=> $page, 'status' => 1]);
}

// Удаление комментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header('location: http://localhost/dinamicsite/admin/comments/index.php');
}

// Статус публикация или нет
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('comments', $id, ['status' => $publish]);
    header('location: http://localhost/dinamicsite/admin/comments/index.php');
    exit();
}

// Редактирование комментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $oneComment = selectOne('comments', ['id'=> $_GET['id']]);
    $id = $oneComment['id'];
    $email = $oneComment['email'];
    $text1 = $oneComment['comment'];
    $pub = $oneComment['status'];
} // код выше позволяет при клике на edit подтянуть данные из базы и заполнить их на странице
// теперь пишем логику работы при нажатии на "обновить" в категории

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_comment'])){
    $id = $_POST['id'];
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    // запрос в БД
    if($text === ''){
        array_push($errMsg,"Комментарий не имеет содержимого текста");
    }elseif(mb_strlen($text, 'UTF8') < 50){
        array_push($errMsg,"Комментарий меньше 50 символов");
    }else{
        $com = [
        'comment'=> $text,
        'status' => $publish,
    ];
    $comment = update('comments', $id, $com);  // отправка на сервер
    header('location: http://localhost/dinamicsite/admin/comments/index.php');
} 
    }else{
        $text = trim($_POST['comment']);
        $publish = isset($_POST['publish']) ? 1 : 0;
}