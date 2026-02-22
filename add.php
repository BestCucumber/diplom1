<?php
require_once('bd.php');

$fio = trim($_POST['fio'] ?? '');
$login = trim($_POST['login'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$repeatpassword = $_POST['repeatpassword'] ?? '';

// Проверка на пустые поля
if (empty($fio) || empty($login) || empty($email) || empty($password)) {
    die('Заполните все поля!');
}

// Проверка совпадения паролей
if ($password !== $repeatpassword) {
    die('Пароли не совпадают!');
}

// ХЭШИРУЕМ пароль (это обязательно!)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Вставляем в базу
$stmt = $pdo->prepare('INSERT INTO users (fio, login, email, password) VALUES (?, ?, ?, ?)');
$stmt->execute([$fio, $login, $email, $hashedPassword]);

// Перенаправляем на страницу входа
header('Location: /pages/sign-in.php');
exit;
?>