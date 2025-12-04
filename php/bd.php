<?php

$user = 'root';
$pass = 'mysql';

try
{
    $pdo = new PDO("mysql:host=localhost; dbname=bipki", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e)
{
    die("Ошибка подключения: " . $e->getMessage());
}

?>