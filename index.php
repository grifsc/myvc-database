<?php
require_once 'config/config.php';
require_once 'config/database.php';

// Get URL path
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
$urlParts = explode('/', $url);

// Route to appropriate controller
$controllerName = ucfirst($urlParts[0]).'Controller';
$action = isset($urlParts[1]) ? $urlParts[1] : 'index';

if(file_exists('controllers/'.$controllerName.'.php')) {
    require_once 'controllers/'.$controllerName.'.php';
    $controller = new $controllerName();
    if(method_exists($controller, $action)) {
        $controller->$action();
    } else {
        require_once 'views/404.php';
    }
} else {
    require_once 'views/404.php';
}
?>