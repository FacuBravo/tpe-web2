<?php

class AuthView {
    public function renderLogin($mensaje = null) {
        $titulo = "Iniciar sesion";
        $action = "auth";
        require_once "./templates/header.phtml";
        require_once "./templates/form-login-registro.phtml";
        require_once "./templates/footer.phtml";
    }

    public function renderRegister($mensaje = null) {
        $titulo = "Registro";
        $action = "nuevoUsuario";
        require_once "./templates/header.phtml";
        require_once "./templates/form-login-registro.phtml";
        require_once "./templates/footer.phtml";
    }
}