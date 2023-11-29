<?php
// Запросы к БД MySQL при помощи PHP (PDO)
$connection = new PDO("mysql:host=localhost;dbname=test;charset=utf8","root","mysql");

//Прямой запрос
// $query = "INSERT test (name, age, pass) VALUE ('Яночка', '33', 'Рлвшшывт1')";
// $count = $connection->exec( $query );
$name = 'Никитос';
$age = 55;
$pass = 'hfKfm2';
$param = [
    'n'=> $name,
    'age'=> $age,
    'pass'=> $pass
];

$sql = "INSERT test (name, age, pass) VALUE (:n, :age, :pass)"; //готовим запрос с плейсхолдерами
$query = $connection->prepare($sql); //подготавливаем запрос
$query->execute($param);