<?php

require_once "../bd.php";

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$data = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: space-between;
    }
</style>

<body>
    <div class="container">
        <?php foreach ($data as $user): ?>
            <div class="user-container">
                <h1 class="title">
                    <?= $user['fio'] ?>
                </h1>
                <p>Email:
                    <?= $user['email'] ?>
                </p>
                <a href="http://diplom1/html/bio.php?user-id=<?= $user['id'] ?>">Перейти на страницу пользователя</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>