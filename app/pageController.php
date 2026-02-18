<?php
class PageController
{
    // === ОСНОВНЫЕ СТРАНИЦЫ (pages) ===
    public function index()
    {
        include ROOT_PATH . '/pages/index.html';
    }

    public function auto()
    {
        include ROOT_PATH . '/pages/sign-in.html';
    }

    public function reg()
    {
        include ROOT_PATH . '/pages/sign-up.html';
    }

    public function profile()
    {
        $this->checkAuto();
        include ROOT_PATH . '/pages/profile.php';
    }

    public function news()
    {
        include ROOT_PATH . '/pages/news.html';
    }

    public function archive()
    {
        include ROOT_PATH . '/pages/archive.html';
    }

    public function heroes()
    {
        include ROOT_PATH . '/pages/heroes.html';
    }

    public function signIn()
    {
        $this->auto();
    }

    public function signUp()
    {
        $this->reg();
    }

    // === ПРОВЕРКА АВТОРИЗАЦИИ ===
    private function checkAuto()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /auto");
            exit;
        }
    }

    // === МАГИЧЕСКИЙ МЕТОД ДЛЯ ВСЕХ ОСТАЛЬНЫХ СТРАНИЦ ===
    public function __call($method, $args)
    {
        // Сначала ищем в /pages
        $file = ROOT_PATH . '/pages/' . $method . '.html';
        if (file_exists($file)) {
            include $file;
            return;
        }

        // Потом в /html
        $file = ROOT_PATH . '/html/' . $method . '.html';
        if (file_exists($file)) {
            include $file;
            return;
        }

        // Если ничего нет — 404
        http_response_code(404);
        echo '<h1>404 - Страница не найдена</h1>';
        echo '<p>Страница ' . htmlspecialchars($method) . ' не найдена</p>';
        echo '<a href="/">На главную</a>';
    }
}