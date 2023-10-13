<?php
require_once "./app/controllers/libros.controller.php";
require_once "./app/controllers/auth.controller.php";
require_once "./app/controllers/secciones.controller.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// home         ->      LibrosController->showHome()
// login        ->      AuthController->showLogin()
// auth         ->      AuthController->auth()
// logout       ->      AuthController->logout()
// registro     ->      AuthController->showRegister()
// nuevoUsuario ->      AuthController->nuevoUsuario()
// libro/id     ->      LibrosController->showLibro($id)
// autor/id     ->      LibrosController->showAutor($id)
// autores      ->      SeccionesController->showAutores()
// genero/id    ->      LibrosController->showGenero($id)
// generos      ->      SeccionesController->showGeneros()
// about        ->      SeccionesController->showAbout()

switch ($params[0]) {
    case 'home':
        $controller = new LibrosController();
        $controller->showLibros();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'registro':
        $controller = new AuthController();
        $controller->showRegistro();
        break;
    case 'nuevoUsuario':
        $controller = new AuthController();
        $controller->nuevoUsuario();
        break;
    case 'libro':
        $controller = new LibrosController();
        $controller->showLibro($params[1]);
        break;
    case 'autor':
        $controller = new LibrosController();
        $controller->showAutor($params[1]);
        break;
    case 'autores':
        $controller = new SeccionesController();
        $controller->showAutores();
        break;
    case 'genero':
        $controller = new LibrosController();
        $controller->showGenero($params[1]);
        break;
    case 'generos':
        $controller = new SeccionesController();
        $controller->showGeneros();
        break;
    case 'about':
        $controller = new SeccionesController();
        $controller->showAbout();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
