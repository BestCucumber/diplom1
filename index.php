<?php
define('ROOT_PATH', __DIR__);
// Подключаем роутер
require_once 'app/router.php';

// Создаем роутер
$router = new Router();

// Запускаем его
$router->run();
?>