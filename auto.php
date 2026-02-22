<?php
session_start();
require_once('bd.php');

$login = trim($_POST['login'] ?? '');
$password = $_POST['password'] ?? '';

// Проверка на пустые поля
if (empty($login) || empty($password)) {
    $_SESSION['error'] = 'Заполните все поля';
    header('Location: /pages/sign-in.php');
    exit;
}

// Ищем пользователя
$stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$stmt->execute([':login' => $login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // УСПЕШНЫЙ ВХОД - создаем сессию
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_login'] = $user['login'];
    
    // ТОЛЬКО РЕДИРЕКТ - БЕЗ ECHO!
    header('Location: /pages/profile.php');
    exit();
    
} else {
    // ОШИБКА ВХОДА
    $_SESSION['error'] = 'Неверный логин или пароль';
    header('Location: /pages/sign-in.php');
    exit;
}
?>