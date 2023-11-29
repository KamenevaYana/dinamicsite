<?php
// Запросы к БД MySQL при помощи PHP
require_once 'setting.php';

// Подключение к MySQL
$mysqli = new mysqli($host, $user, $pass, $data);
if ($mysqli->connect_error) die('Error connection');

// $link = mysqli_connect("localhost", "root", "");
// if ($link == false) {print("Ошибка: невозможно подключиться" . mysqli_connect_error()); }
// else {print("Соединение установлено");}

// чтение данных
$query = "SELECT * FROM test";
$result = $mysqli->query($query);
if (!$result) die("Error result");

$row = $result->num_rows;
for ($i = 0; $i < $row; $i++) {
    $result->data_seek($i);
    echo "Name: " . $result->fetch_assoc()['name'] . '<br>';
    $result->data_seek($i);
    echo "Count: " . $result->fetch_assoc()['count'] . '<br>';
}

// echo '<pre>';
// print_r($rows);
// echo '</pre>';
$result->close();
$mysqli->close();
?>