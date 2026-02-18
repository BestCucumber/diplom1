<?php
class Router {
    private $routes;
    
    public function __construct() {
        $this->routes = require_once __DIR__ . '/routes.php';
    }
    
    public function run() {
        $page = $this->getPageName();
        
        if (isset($this->routes[$page])) {
            $this->callAction($this->routes[$page]);
        } else {
            $this->showError();
        }
    }
    
    private function getPageName() {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        
        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        
        $uri = trim($uri, '/');
        
        return '/' . $uri;
    }

    private function callAction($route) {
        $controllerName = $route[0];
        $methodName = $route[1];

        $controllerFile = __DIR__ . '/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();

            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                $controller->$methodName(); // Сработает __call
            }
        } else {
            $this->showError("Контроллер {$controllerName} не найден");
        }
    }
    
    private function showError($message = null) {
        http_response_code(404);
        echo '<h1>404 - Страница не найдена</h1>';
        if ($message) {
            echo '<p>' . htmlspecialchars($message) . '</p>';
        }
        echo '<a href="/">На главную</a>';
    }
}