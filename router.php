<?php
require_once "./app/controllers/libros.controller.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// home         ->      LibrosController->showHome();
// libro/id     ->      LibrosController->showLibro($id)

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new LibrosController();
        $controller->showLibros();
        break;
    case 'libro':
        $controller = new LibrosController();
        $controller->showLibro($params[1]);
        break;
    default: 
        echo "404 Page Not Found";
        break;
}