<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/dinamicsite/app/database/db.php";

$errMsg = [];
$users = selectAll('users');
// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passFirst = trim($_POST['pass']);
    $passwordSecond = trim($_POST['secondpass']);

    // запрос в БД
    if($login === ''|| $email === ''|| $passFirst === ''){
        array_push($errMsg, 'Не все поля заполнены!');
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, 'Логин должен быть более двух символов');
    }elseif($passFirst !== $passwordSecond){
        array_push($errMsg, 'Пароли в обоих полях должны совпадать');
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg, 'Пользователь с такой почтой уже зарегистрирован');
        }else{
        $pass = password_hash($passFirst, PASSWORD_DEFAULT);
        $post = [
        'admin' => $admin,
        'user_name'=> $login,
        'email'=> $email,
        'password'=> $pass // подставляем уже хэшированный пароль
    ];
    $id = insert('users', $post);  // отправка на сервер
    //$errMsg = "Пользователь " . "<strong>" . $login . "</strong>" . " успешно зарегестрирован";
    $user = selectOne('users', ['id'=> $id]);
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['user_name'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']){
        header('Location: http://localhost/dinamicsite/admin/posts/index.php');
    }else{
    header('Location: http://localhost/dinamicsite/');}
        }
    }
} else{
    $login = ''; //при повторном вводе сохраняем введеные данные
    $email = ''; // + в html куске registrariom.php вставляем пхп код в атрибут value
}

// Код для формы логина/авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    
    // запрос в БД
    if($email === ''|| $pass === '') {
        array_push($errMsg, 'Не все поля заполнены!');
    }else{
    $existence = selectOne('users', ['email' => $email]);
    if($existence && password_verify($pass, $existence['password'])) {
        $_SESSION['id'] = $existence['id'];
        $_SESSION['login'] = $existence['user_name'];
        $_SESSION['admin'] = $existence['admin'];
    
        if ($_SESSION['admin']){
            header('Location: http://localhost/dinamicsite/admin/posts/index.php');
        }else {
            header('Location: http://localhost/dinamicsite/');
        }
        }else {$errMsg = 'Почта и/или пароль введены неверно';}
    }
}else{
    $email = ''; // смотри выше - не стираем данные почты при неверном вводе
}

// ДОБАВЛЕНИЕ НОВОГО ПОЛЬЗОВАТЕЛЯ В АДМИНКЕ
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passFirst = trim($_POST['pass']);
    $passwordSecond = trim($_POST['secondpass']);

    // запрос в БД
    if($login === ''|| $email === ''|| $passFirst === ''){
        array_push($errMsg, 'Не все поля заполнены!');
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, 'Логин должен быть более двух символов');
    }elseif($passFirst !== $passwordSecond){
        array_push($errMsg, 'Пароли в обоих полях должны совпадать');
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            array_push($errMsg, 'Пользователь с такой почтой уже зарегистрирован');
        }else{
        $pass = password_hash($passFirst, PASSWORD_DEFAULT);
        if(isset($_POST['admin'])) $admin = 1;
        $user = [
        'admin' => $admin,
        'user_name'=> $login,
        'email'=> $email,
        'password'=> $pass // подставляем уже хэшированный пароль
    ];
    $id = insert('users', $user);  // отправка на сервер
    //$errMsg = "Пользователь " . "<strong>" . $login . "</strong>" . " успешно зарегестрирован";
    $user = selectOne('users', ['id'=> $id]);
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['user_name'];
    $_SESSION['admin'] = $user['admin'];

    if ($_SESSION['admin']){
        header('Location: http://localhost/dinamicsite/admin/posts/index.php');
    }else{
    header('Location: http://localhost/dinamicsite/');}
        }
    }
} else{
    $login = ''; //при повторном вводе сохраняем введеные данные
    $email = ''; // + в html куске registrariom.php вставляем пхп код в атрибут value
}

// УДАЛЕНИЕ ПОЛЬЗОВАТЕЛЯ В АДМИНКЕ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: http://localhost/dinamicsite/admin/users/index.php');
}

//
// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ 
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('users', ['id'=> $_GET['edit_id']]);
    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['user_name'];
    $email = $user['email'];
} // код выше позволяет при клике на edit подтянуть данные из базы и заполнить их на странице

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    $id = $_POST['id'];
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $passFirst = trim($_POST['pass']);
    $passwordSecond = trim($_POST['secondpass']);
    $admin = isset($_POST['admin']) ? 1 : 0;

// запрос в БД
    if($login === ''){
        array_push($errMsg,"Не все поля заполнены!");
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg,"Логин должен быть более двух символов");
    }elseif($passFirst !== $passwordSecond){
        array_push($errMsg, 'Пароли в обоих полях должны совпадать');
    }else{
        $pass = password_hash($passFirst, PASSWORD_DEFAULT);
        if(isset($_POST['admin'])) $admin = 1;
        $user = [
        'admin' => $admin,
        'user_name'=> $login,
        'email'=> $email,
        'password'=> $pass // подставляем уже хэшированный пароль
    ];
    $user = update('users', $id, $user);  // отправка на сервер
    header('location: http://localhost/dinamicsite/admin/users/index.php');
} 
    }else{
    $login = '';
    $email = ''; 
}

// публикация или нет
// if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
//     $id = $_GET['pub_id'];
//     $publish = $_GET['publish'];
//     $postId = update('posts', $id, ['status' => $publish]);
//     header('location: http://localhost/dinamicsite/admin/posts/index.php');
//     exit();
// }