<?php
// Функция запросов к базе данных
include $_SERVER['DOCUMENT_ROOT'] . '/dinamicsite/app/database/connect.php';
//session_start();

// функция вывода данных в масиве
function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
// !!!функция на проверку ошибок!!!
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}
// !!!запрос на получение данных с одной таблицы в БД, с подготовкой, далее проверяем функцией на ошибки и выводим массив!!!
function selectAll($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'". $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
        }else {
            $sql = $sql . " AND $key = $value";
        }
        $i++;
    }
}
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// !!!запрос на получение одной строки с выбранной таблицы!!!
function selectOne($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'". $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
        }else {
            $sql = $sql . " AND $key = $value";
        }
        $i++;
    }
}
    // $sql = $sql . " LIMIT 1"; не обязателен, т.к. используем fetch вместо fetchAll
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


// !!!запись в таблицу БД!!!
function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }else{
        $coll = $coll . ", $key";
        $mask = $mask . ", '" .  "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}
//insert('users', $arrData); пример вызова

// !!!Обновление строки в таблице !!!
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
// update('users', 18, $param); пример вызова

// !!!Удаление строки в таблице!!!
function delete($table, $id){
    global $pdo;
    $sql = "DELETE FROM $table WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
//delete('users', 18); пример вызова

// выборка админов в записи с постами вместо id
function sellectAllFromPostsWithUsers($table1, $table2) {
    global $pdo;
    $sql = "SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.user_name
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// выборка записей с автором на галвной странице
function sellectAllFromPostsWithUsersOnIndex($table1, $table2, $limit, $offset) {
    global $pdo;
    $sql = "SELECT 
    p.*, u.user_name 
    FROM $table1 AS p 
    JOIN $table2 AS u 
    ON p.id_user = u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Поиск по заголовкам и содержимому (примитивный)
function searchInTitleAndContent($text, $table1, $table2) {
    global $pdo;
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    $sql = "SELECT 
    p.*, u.user_name 
    FROM $table1 AS p 
    JOIN $table2 AS u 
    ON p.id_user = u.id 
    WHERE p.status=1 
    AND p.title LIKE '%$text%' 
    OR p.content LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// выборка записИ с автором ДЛЯ СИНГЛ СТРАНИЦЫ
function sellectPostFromUserForSingle($table1, $table2, $id) {
    global $pdo;
    $sql = "SELECT p.*, u.user_name FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
// дла пэйдинга
function countRow($table) {
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table WHERE status = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}