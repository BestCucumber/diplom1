<?php
class Router {
    private $routes;
    
    public function __construct() {
        $this->routes = require_once 'routes.php';
    }
    
    public function run() {
        $page = $this->getPageName();
        
        if (isset($this->routes[$page])) {
            $this->showPage($this->routes[$page]);
        } else {
            $this->showError();
        }
    }
    
    private function getPageName() {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        
        // Убираем GET-параметры
        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        
        // Убираем начальный и конечный слэши
        $uri = trim($uri, '/');
        
        return empty($uri) ? '/' : $uri;
    }
    
    private function showPage($filePath) {
        if (file_exists($filePath)) {
            include $filePath;
        } else {
            $this->showError();
        }
    }
    
    private function showError() {
        http_response_code(404);
        echo '<h1>404 - Страница не найдена</h1>';
        echo '<p>Извините, такой страницы нет.</p>';
        echo '<a href="/">На главную</a>';
    }
}
?>