<?php
class PageController
{
    public function index()
    {
        // Логика для главной
        $title = "Главная страница";
        include ROOT_PATH . '/pages/index.html'; // Представление (шаблон)
    }

    public function profile()
    {
        $this->checAuto();
        // Логика для профиля
        
        include ROOT_PATH . '/pages/profile.php'; // Представление
    }

    private function checAuto()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: auto");
            exit;
        }
    }

    public function auto()
    {
        include ROOT_PATH . '/pages/auto.html';
    }

    public function reg()
    {
        include ROOT_PATH . '/pages/reg.html';
    }
}
?>