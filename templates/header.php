<?php
// templates/header.php
?>
<header>
    <div class="header-container">
        <!-- Бургер-меню (три полоски) -->
        <div class="burger" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
        <!-- Навигационное меню -->
        <nav class="menu" id="menu">
            <a href="/">ГЛАВНАЯ</a>
            <a href="/#ex">ЭКСПОЗИЦИЯ</a>
            <a href="/#heroes">ИСТОРИИ ГЕРОЕВ</a>
            <a href="/#calendar">ДАТЫ</a>
            <a href="/#kamyshin">КАМЫШИН</a>
            <a href="/#archive">АРХИВ</a>
            <a href="/#about">О МУЗЕЕ</a>
            <a href="/#contact">КОНТАКТЫ</a>
            <a href="/#news">НОВОСТИ</a>
        </nav>
        
        <div class="auth-buttons">
            <?php if(isset($_SESSION['user_id'])): ?>
                <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_login']); ?></span>
                <a href="/pages/profile.php">
                    <img class="icon" src="/assets/images/carnation_3340088.png" alt="">
                </a>
                
                <button class="btn"><a href="/logout.php">Выйти</a></button>
            <?php else: ?>
                <button class="btn"><a href="/pages/sign-in.php">Войти</a></button>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- JavaScript для бургер-меню -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');
    
    burger.addEventListener('click', function() {
        this.classList.toggle('active');
        menu.classList.toggle('active');
    });
});
</script>