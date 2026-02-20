<?php

$id = $_GET['user-id'];
require_once "../bd.php";

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Имя: <?= $user['fio'] ?>
    Почта: <?= $user['email'] ?>
    Логин: <?= $user['login'] ?>
    Пароль: <?= $user['password'] ?>
</body>

</html>