<?php

$hostname = "localhost";
// $database = "loginsystem";
$database = "planit_database";
$username = "root";
$password = "";
$connect = "mysql:host=$hostname;dbname=$database;";
// $options = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES=> false];

try {
    $pdo = new PDO($connect, $username, $password);// , $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>