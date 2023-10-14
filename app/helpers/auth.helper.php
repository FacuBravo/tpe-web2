<?php

class AuthHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function verifyPermisos() {
        AuthHelper::verify();
        
        if ($_SESSION['USER_ROL'] != "administrador") {
            header("Location:" . BASE_URL);
        }
    }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER'] = $user->usuario;
        $_SESSION['USER_ROL'] = $user->rol;
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify() {
        AuthHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'home');
            die();
        }
    }
}