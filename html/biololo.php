<?php
session_start();
require_once('../bd.php');

// Получаем и проверяем ID героя
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("Неверный идентификатор героя");
}

// Получаем основную информацию о герое
$stmt = $pdo->prepare("SELECT name, header_title, star_week FROM bio WHERE id = ?");
$stmt->execute([$id]);
$info = $stmt->fetch();

if (!$info) {
    die("Герой не найден");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($info['name']); ?> - Биография</title>
    <link rel="stylesheet" href="../bibliopgh.css">
</head>
<body>
    <div id="header">
        <h1>Bibliopgh</h1>
    </div>

    <div id="content">
        <?php
        // Заголовок (имя героя)
        echo "<h1>" . htmlspecialchars($info['name']) . "</h1>";

        // Дополнительный заголовок (если есть)
        if (!empty($info['header_title'])) {
            echo "<p><strong>" . htmlspecialchars($info['header_title']) . "</strong></p>";
        }

        // Годы жизни (если есть)
        if (!empty($info['star_week'])) {
            echo "<p>Годы жизни: " . htmlspecialchars($info['star_week']) . "</p>";
        }

        // Получаем контент (разделы биографии)
        $stmt = $pdo->prepare("SELECT content_type, content FROM bio_content WHERE bio_id = ? ORDER BY sort_order");
        $stmt->execute([$id]);
        $sections = $stmt->fetchAll();

        // Выводим контент, если он есть
        if (!empty($sections) && is_array($sections)) {
            foreach ($sections as $sec) {
                if ($sec['content_type'] == 'title') {
                    // Заголовок раздела
                    echo "<h2>" . htmlspecialchars($sec['content']) . "</h2>";
                    
                } elseif ($sec['content_type'] == 'text') {
                    // Текстовый абзац (с сохранением переносов строк)
                    echo "<p>" . nl2br(htmlspecialchars($sec['content'])) . "</p>";
                    
                } elseif ($sec['content_type'] == 'photo') {
                    // Изображение
                    $photoPath = trim($sec['content']);
                    // Проверяем, не пустой ли путь
                    if (!empty($photoPath)) {
                        $photoPath = str_replace('\\', '/', $photoPath);
                        echo "<img src='" . htmlspecialchars($photoPath) . "' alt='" . htmlspecialchars($info['name']) . "' style='max-width: 100%; margin: 20px 0;'>";
                    }
                }
            }
        } else {
            echo "<p>Биография в разработке</p>";
        }
        ?>

        <div style="margin-top: 40px;">
            <a href="index.html">← На главную</a>
            

            <a href="bibliopgh.php">← Назад к списку</a>
        </div>
    </div>

    <div id="footer">
        <h2>Bibliopgh</h2>
    </div>
</body>
</html>