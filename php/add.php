<?php
session_start();
require_once('bd.php');

$user = $_POST['fio'] ?? '';
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$repeat_password = $_POST['repeatpassword'] ?? '';

try
{
    $check_stmt = $pdo->prepare('SELECT id FROM users WHERE login = :login');
    $check_stmt->execute([':login' => $login]);

    if ($check_stmt->fetch())
    {
        die("Пользователь с таким логином уже существует");
    }

    $stmt = $pdo->prepare('INSERT INTO users(fio, login, email, password, repeat_password) VALUES (:fio, :login, :email, :password, :repeat_password)');
    $stmt->execute([
        ':fio' => $user,
        ':login' => $login,
        ':email' => $email,
        ':password' => $password,
        ':repeat_password' => $repeat_password
    ]);

    header('Location:login.php?message=registration_success');
} catch(PDOException $e)
{
    die('Ошибка: ' . $e->getMessage());
}

?>
