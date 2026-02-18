<?php
define('ROOT_PATH', __DIR__);
require_once 'app/router.php';

$router = new Router();
$router->run();