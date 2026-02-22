<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/bd.php');

// Проверка авторизации
if(!isset($_SESSION['user_id'])) {
    header("Location: /pages/sign-in.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Получаем данные пользователя
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute([':id' => $user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("Ошибка: пользователь не найден");
}

// Получаем статистику пользователя
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
    // Если таблиц нет, ставим заглушки
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
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Профиль пользователя</title>
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
    
    <main>
        <div class="prof-container">
            <!-- Верхняя часть профиля с обложкой -->
            <div class="prof-cover">
                <div class="prof-cover-overlay"></div>
                <div class="prof-header">
                    <div class="prof-avatar">
                        <?php if(!empty($user['avatar'])): ?>
                            <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar">
                        <?php else: ?>
                            <div class="prof-avatar-placeholder">
                                <?= strtoupper(substr($user['login'] ?? 'U', 0, 1)) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="prof-title-info">
                        <h1><?= htmlspecialchars($user['login'] ?? 'Пользователь') ?></h1>
                        <p class="prof-badge">Хранитель истории</p>
                        <p class="prof-regdate">На сайте с <?= $reg_date ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Статистика пользователя -->
            <div class="prof-stats">
                <div class="prof-stat-item">
                    <span class="prof-stat-value"><?= $heroes_count ?></span>
                    <span class="prof-stat-label">Историй героев</span>
                </div>
                <div class="prof-stat-item">
                    <span class="prof-stat-value"><?= $comments_count ?></span>
                    <span class="prof-stat-label">Комментариев</span>
                </div>
                <div class="prof-stat-item">
                    <span class="prof-stat-value">0</span>
                    <span class="prof-stat-label">Документов в архиве</span>
                </div>
                <div class="prof-stat-item">
                    <span class="prof-stat-value">3</span>
                    <span class="prof-stat-label">Достижения</span>
                </div>
            </div>
            
            <!-- Навигация по вкладкам профиля -->
            <div class="prof-tabs">
                <button class="prof-tab-btn active" data-tab="contribution">Мой вклад</button>
                <button class="prof-tab-btn" data-tab="favorites">Избранное</button>
                <button class="prof-tab-btn" data-tab="achievements">Достижения</button>
                <button class="prof-tab-btn" data-tab="settings">Настройки</button>
            </div>
            
            <!-- Содержимое вкладок -->
            <div class="tab-content">
                <!-- Вкладка "Мой вклад" -->
                <div class="prof-tab-pane active" id="contribution">
                    <h2 class="prof-tab-title">Мой вклад в сохранение памяти</h2>
                    
                    <div class="prof-grid">
                        <div class="prof-card">
                            <div class="prof-card-icon">📜</div>
                            <h3>Добавленные истории</h3>
                            <?php if($heroes_count > 0): ?>
                                <ul class="prof-items-list">
                                    <li><a href="#">Иванов Петр Васильевич</a></li>
                                    <li><a href="#">Сидоров Алексей Николаевич</a></li>
                                </ul>
                            <?php else: ?>
                                <p class="prof-empty-message">Вы еще не добавили ни одной истории</p>
                                <a href="/add-hero" class="prof-btn-add">+ Добавить историю</a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="prof-card">
                            <div class="prof-card-icon">📁</div>
                            <h3>Архивные документы</h3>
                            <p class="prof-empty-message">Вы еще не загружали документы</p>
                            <a href="/archive/upload" class="prof-btn-add">+ Загрузить документ</a>
                        </div>
                        
                        <div class="prof-card">
                            <div class="prof-card-icon">💬</div>
                            <h3>Последние комментарии</h3>
                            <?php if($comments_count > 0): ?>
                                <div class="prof-comment-preview">
                                    <p>К статье "Битва за Сталинград":</p>
                                    <p class="prof-comment-text">"Вечная память героям..."</p>
                                </div>
                            <?php else: ?>
                                <p class="prof-empty-message">Нет комментариев</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Вкладка "Избранное" -->
                <div class="prof-tab-pane" id="favorites">
                    <h2 class="prof-tab-title">Избранное</h2>
                    <div class="prof-favorites-grid">
                        <div class="prof-favorite-item">
                            <img src="/assets/images/hero1.jpg" alt="Hero">
                            <div class="prof-favorite-info">
                                <h4>Герой Советского Союза</h4>
                                <p>Алексей Маресьев</p>
                            </div>
                        </div>
                        <div class="prof-favorite-item">
                            <img src="/assets/images/event1.jpg" alt="Event">
                            <div class="prof-favorite-info">
                                <h4>Сталинградская битва</h4>
                                <p>17.07.1942 - 02.02.1943</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Вкладка "Достижения" -->
                <div class="prof-tab-pane" id="achievements">
                    <h2 class="prof-tab-title">Мои достижения</h2>
                    <div class="prof-achievements-grid">
                        <div class="prof-achievement-card earned">
                            <div class="prof-achievement-icon">🎖️</div>
                            <h4>Новичок</h4>
                            <p>Зарегистрировался на сайте</p>
                        </div>
                        <div class="prof-achievement-card">
                            <div class="prof-achievement-icon">📖</div>
                            <h4>Летописец</h4>
                            <p>Добавил 5 историй героев</p>
                            <span class="prof-progress">0/5</span>
                        </div>
                        <div class="prof-achievement-card">
                            <div class="prof-achievement-icon">🗂️</div>
                            <h4>Архивариус</h4>
                            <p>Загрузил 10 документов</p>
                            <span class="prof-progress">0/10</span>
                        </div>
                    </div>
                </div>
                
                <!-- Вкладка "Настройки" -->
                <div class="prof-tab-pane" id="settings">
                    <h2 class="prof-tab-title">Настройки профиля</h2>
                    <form class="prof-settings-form" action="/update-profile.php" method="POST" enctype="multipart/form-data">
                        <div class="prof-form-group">
                            <label>Имя пользователя</label>
                            <input type="text" name="username" value="<?= htmlspecialchars($user['login'] ?? '') ?>">
                        </div>
                        <div class="prof-form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">
                        </div>
                        <div class="prof-form-group">
                            <label>Аватар</label>
                            <input type="file" name="avatar" accept="image/*">
                        </div>
                        <div class="prof-form-group">
                            <label>Новый пароль</label>
                            <input type="password" name="new_password" placeholder="Оставьте пустым, если не хотите менять">
                        </div>
                        <button type="submit" class="prof-btn-save">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
   <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>
    
    <script>
        document.querySelectorAll('.prof-tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.prof-tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.prof-tab-pane').forEach(p => p.classList.remove('active'));
                
                this.classList.add('active');
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>
</body>
</html>