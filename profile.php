<?php
session_start();
require_once('bd.php');

if(!isset($_SESSION['user_id'])) {
    header("Location: sign-in.html");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute([':id' => $user_id]);
$user = $stmt->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/profile.css">
  <title>Профиль пользователя</title>
</head>
<body>
  <header>
    <div class="container-head header-container">
        <nav class="menu">
            <a href="#hero">ГЛАВНАЯ</a>
            <a href="#ex">ЭКСПОЗИЦИЯ</a>
            <a href="#heroes">ИСТОРИИ ГЕРОЕВ</a>
            <a href="#calendar">ДАТЫ</a>
            <a href="#kamyshin">КАМЫШИН</a>
            <a href="#archive">АРХИВ</a>
            <a href="#about">О МУЗЕЕ</a>
            <a href="#contact">КОНТАКТЫ</a>
            <a href="#news">НОВОСТИ</a>
        </nav>
        <div class="user-id">
            <a href="/profile.php"><img src="/assets/images/Иконка.jpg" alt="icons"></a>
        </div>
        <div class="auth-buttons">
            <button class="btn"><a href="/pages/sign-in.html">Выйти</a></button>
        </div>
    </div>
</header>
<main>
    <div class="main-content"></div>
</main>
<footer>
    <div class="footer-content foot-container">
        <div class="footer-section">
            <h4>Виртуальный музей ВОВ</h4>
            <p>Проект ГАПОУ "Камышинский Политехнический Колледж" по сохранению исторической памяти</p>
        </div>
        
        <div class="footer-section">
            <h4>Быстрые ссылки</h4>
            <a href="#ex">Экспозиции</a>
            <a href="#heroes">Герои</a>
            <a href="#archive">Архив</a>
            <a href="#news">Новости</a>
        </div>
        
        <div class="footer-section">
            <h4>Партнеры</h4>
            <p>ГАПОУ "КПК"</p>
            <p>Камышинский краеведческий музей</p>
            <p>Совет ветеранов г. Камышина</p>
        </div>
        
        <div class="footer-section">
            <h4>Мы в соцсетях</h4>
            <div class="social-links">
                <a href="#" class="social">VK</a>
                <a href="#" class="social">Telegram</a>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>© 2026 Виртуальный музей Великой Отечественной войны. ГАПОУ "Камышинский Политехнический Колледж"</p>
        <p class="student-project">Студенческий проект | Все права защищены</p>
    </div>
</footer>
</body>
</html>