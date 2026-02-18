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

// Получаем статистику пользователя (если есть таблицы)
try {
    // Количество добавленных героев
    $stmt_heroes = $pdo->prepare('SELECT COUNT(*) FROM heroes WHERE user_id = :id');
    $stmt_heroes->execute([':id' => $user_id]);
    $heroes_count = $stmt_heroes->fetchColumn();
    
    // Количество комментариев
    $stmt_comments = $pdo->prepare('SELECT COUNT(*) FROM comments WHERE user_id = :id');
    $stmt_comments->execute([':id' => $user_id]);
    $comments_count = $stmt_comments->fetchColumn();
    
    // Дата регистрации
    $reg_date = date('d.m.Y', strtotime($user['created_at'] ?? 'now'));
} catch(PDOException $e) {
    // Если таблиц нет, просто ставим заглушки
    $heroes_count = 0;
    $comments_count = 0;
    $reg_date = date('d.m.Y');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Профиль пользователя</title>
</head>
<body>
    <header>
        <!-- Шапка остается без изменений -->
        <div class="container-head header-container">
            <nav class="menu">
                <a href="/#hero">ГЛАВНАЯ</a>
                <a href="/#ex">ЭКСПОЗИЦИЯ</a>
                <a href="/#heroes">ИСТОРИИ ГЕРОЕВ</a>
                <a href="/#calendar">ДАТЫ</a>
                <a href="/#kamyshin">КАМЫШИН</a>
                <a href="/#archive">АРХИВ</a>
                <a href="/#about">О МУЗЕЕ</a>
                <a href="/#contact">КОНТАКТЫ</a>
                <a href="/#news">НОВОСТИ</a>
            </nav>
            <div class="user-id">
                <a href="/profile"><img src="/assets/images/Иконка.jpg" alt="icons"></a>
            </div>
            <div class="auth-buttons">
                <button class="btn"><a href="/logout.php">Выйти</a></button>
            </div>
        </div>
    </header>
    
    <main>
        <div class="profile-container">
            <!-- Верхняя часть профиля с обложкой -->
            <div class="profile-cover">
                <div class="cover-overlay"></div>
                <div class="profile-header-content">
                    <div class="profile-avatar">
                        <?php if(!empty($user['avatar'])): ?>
                            <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar">
                        <?php else: ?>
                            <div class="avatar-placeholder">
                                <?= strtoupper(substr($user['username'] ?? 'U', 0, 1)) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="profile-title-info">
                        <h1><?= htmlspecialchars($user['username'] ?? 'Пользователь') ?></h1>
                        <p class="profile-badge">Хранитель истории</p>
                        <p class="profile-regdate">На сайте с <?= $reg_date ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Статистика пользователя -->
            <div class="profile-stats">
                <div class="stat-item">
                    <span class="stat-value"><?= $heroes_count ?></span>
                    <span class="stat-label">Историй героев</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value"><?= $comments_count ?></span>
                    <span class="stat-label">Комментариев</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">0</span>
                    <span class="stat-label">Документов в архиве</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value">3</span>
                    <span class="stat-label">Достижения</span>
                </div>
            </div>
            
            <!-- Навигация по вкладкам профиля -->
            <div class="profile-tabs">
                <button class="tab-btn active" data-tab="contribution">Мой вклад</button>
                <button class="tab-btn" data-tab="favorites">Избранное</button>
                <button class="tab-btn" data-tab="achievements">Достижения</button>
                <button class="tab-btn" data-tab="settings">Настройки</button>
            </div>
            
            <!-- Содержимое вкладок -->
            <div class="tab-content">
                <!-- Вкладка "Мой вклад" -->
                <div class="tab-pane active" id="contribution">
                    <h2 class="tab-title">Мой вклад в сохранение памяти</h2>
                    
                    <div class="contribution-grid">
                        <div class="contribution-card">
                            <div class="card-icon">📜</div>
                            <h3>Добавленные истории</h3>
                            <?php if($heroes_count > 0): ?>
                                <ul class="items-list">
                                    <!-- Здесь будет цикл по историям пользователя -->
                                    <li><a href="#">Иванов Петр Васильевич</a></li>
                                    <li><a href="#">Сидоров Алексей Николаевич</a></li>
                                </ul>
                            <?php else: ?>
                                <p class="empty-message">Вы еще не добавили ни одной истории</p>
                                <a href="/add-hero" class="btn-add">+ Добавить историю</a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="contribution-card">
                            <div class="card-icon">📁</div>
                            <h3>Архивные документы</h3>
                            <p class="empty-message">Вы еще не загружали документы</p>
                            <a href="/archive/upload" class="btn-add">+ Загрузить документ</a>
                        </div>
                        
                        <div class="contribution-card">
                            <div class="card-icon">💬</div>
                            <h3>Последние комментарии</h3>
                            <?php if($comments_count > 0): ?>
                                <div class="comment-preview">
                                    <p>К статье "Битва за Сталинград":</p>
                                    <p class="comment-text">"Вечная память героям..."</p>
                                </div>
                            <?php else: ?>
                                <p class="empty-message">Нет комментариев</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Вкладка "Избранное" -->
                <div class="tab-pane" id="favorites">
                    <h2 class="tab-title">Избранное</h2>
                    <div class="favorites-grid">
                        <div class="favorite-item">
                            <img src="/assets/images/hero1.jpg" alt="Hero">
                            <div class="favorite-info">
                                <h4>Герой Советского Союза</h4>
                                <p>Алексей Маресьев</p>
                            </div>
                        </div>
                        <div class="favorite-item">
                            <img src="/assets/images/event1.jpg" alt="Event">
                            <div class="favorite-info">
                                <h4>Сталинградская битва</h4>
                                <p>17.07.1942 - 02.02.1943</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Вкладка "Достижения" -->
                <div class="tab-pane" id="achievements">
                    <h2 class="tab-title">Мои достижения</h2>
                    <div class="achievements-grid">
                        <div class="achievement-card earned">
                            <div class="achievement-icon">🎖️</div>
                            <h4>Новичок</h4>
                            <p>Зарегистрировался на сайте</p>
                        </div>
                        <div class="achievement-card">
                            <div class="achievement-icon">📖</div>
                            <h4>Летописец</h4>
                            <p>Добавил 5 историй героев</p>
                            <span class="progress">0/5</span>
                        </div>
                        <div class="achievement-card">
                            <div class="achievement-icon">🗂️</div>
                            <h4>Архивариус</h4>
                            <p>Загрузил 10 документов</p>
                            <span class="progress">0/10</span>
                        </div>
                    </div>
                </div>
                
                <!-- Вкладка "Настройки" -->
                <div class="tab-pane" id="settings">
                    <h2 class="tab-title">Настройки профиля</h2>
                    <form class="settings-form" action="/update-profile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Имя пользователя</label>
                            <input type="text" name="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Аватар</label>
                            <input type="file" name="avatar" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Новый пароль</label>
                            <input type="password" name="new_password" placeholder="Оставьте пустым, если не хотите менять">
                        </div>
                        <button type="submit" class="btn-save">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <!-- Подвал без изменений -->
    </footer>
    
    <script>
        // JavaScript для переключения вкладок
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Убираем активный класс у всех кнопок и вкладок
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
                
                // Добавляем активный класс текущей кнопке
                this.classList.add('active');
                
                // Показываем соответствующую вкладку
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>
</body>
</html>