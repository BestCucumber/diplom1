<?php
session_start();
require_once('bd.php');

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login AND password = :password');
$stmt->execute([
    ':login' => $login,
    ':password' => $password
]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user)
{
    $_SESSION['user_id'] = $user['id'];
    header('Location:profile.php?user_id=' . $user['id']);
    exit();
} else
{
    echo 'Аккаунта не существует или неверный логин или пароль';
}