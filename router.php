<?php

require_once "./app/controllers/libros.controller.php";
require_once "./app/controllers/autores.controller.php";
require_once "./app/controllers/auth.controller.php";
require_once "./app/controllers/secciones.controller.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// home              ->      LibrosController->showHome()
// login             ->      AuthController->showLogin()
// auth              ->      AuthController->auth()
// logout            ->      AuthController->logout()
// registro          ->      AuthController->showRegister()
// nuevoUsuario      ->      AuthController->nuevoUsuario()
// libro/id          ->      LibrosController->showLibro($id)
// autor/id          ->      AutoresController->showAutor($id)
// autores           ->      SeccionesController->showAutores()
// about             ->      SeccionesController->showAbout()
// editar            ->      SeccionesController->showEditar()
// editarLibro       ->      LibrosController->editar()
// eliminarLibro     ->      LibrosController->eliminar()
// eliminarAutor     ->      AutoresController->eliminar()


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
        $controller = new AutoresController();
        $controller->showAutor($params[1]);
        break;
    case 'autores':
        $controller = new SeccionesController();
        $controller->showAutores();
        break;
    case 'about':
        $controller = new SeccionesController();
        $controller->showAbout();
        break;
    case 'cargarLibro':
        $controller = new SeccionesController();
        $controller->showCargarLibro();
        break;
    case 'nuevoLibro':
        $controller = new LibrosController();
        $controller->nuevoLibro();
        break;
    case 'editar':
        $controller = new SeccionesController();
        $controller->showEditar($params[1]);
        break;
    case 'editarLibro':
        $controller = new LibrosController();
        $controller->editar();
        break;
    case 'eliminarLibro':
        $controller = new LibrosController();
        $controller->eliminarLibro($params[1]);
        break;
    case 'eliminarAutor':
        $controller = new AutoresController();
        $controller->eliminarAutor($params[1]);
        break;
    default:
        $controller = new SeccionesController();
        $controller->showError(404);
        break;
}
