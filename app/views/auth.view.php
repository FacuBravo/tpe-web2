<?php

require_once './app/helpers/views.helper.php';

class AuthView {
    public function renderLogin($mensaje = null) {
        $titulo = "Iniciar sesion";
        $action = "auth";
        ViewsHelper::header($titulo);
        require_once "./templates/form-login-registro.phtml";
        ViewsHelper::footer();
    }

    public function renderRegister($mensaje = null) {
        $titulo = "Registro";
        $action = "nuevoUsuario";
        ViewsHelper::header($titulo);
        require_once "./templates/form-login-registro.phtml";
        ViewsHelper::footer();
    }
}