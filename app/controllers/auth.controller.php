<?php

require_once './app/views/auth.view.php';
require_once './app/models/usuarios.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController {
    private $view, $model;

    public function __construct() {
        $this->view = new AuthView();
        $this->model = new UsuariosModel();
    }

    public function showLogin() {
        $this->view->renderLogin();
    }

    public function showRegistro() {
        $this->view->renderRegister();
    }

    public function auth() {
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];

        if (empty($usuario) || empty($contrasenia)) {
            $this->view->renderLogin("Faltan completar datos");
            return;
        }

        $usuario = $this->model->getPorUsuario($usuario);

        if ($usuario && password_verify($contrasenia, $usuario->contrasenia)) {
            AuthHelper::login($usuario);
            
            header("Location: " . BASE_URL . 'home');
        } else {
            $this->view->renderLogin("Usuario o contraseña incorrectos");
        }
    }

    public function nuevoUsuario() {
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];

        if (empty($usuario) || empty($contrasenia)) {
            $this->view->renderRegister("Faltan completar datos");
            return;
        }

        $user = $this->model->getPorUsuario($usuario);

        if ($user) {
            $this->view->renderRegister("Nombre de usuario ya usado");
            return;
        }

        $hash = password_hash($contrasenia, PASSWORD_BCRYPT);

        $this->model->nuevoUsuario($usuario, $hash);

        header("Location:" . BASE_URL . 'login');
    }

    public function logOut() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'home');
    }
}