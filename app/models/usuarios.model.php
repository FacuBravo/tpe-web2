<?php

class UsuariosModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=libreria;charset=utf8', 'root', '');
    }

    public function getPorUsuario($usuario) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function nuevoUsuario($usuario, $contrasenia) {
        $query = $this->db->prepare("INSERT INTO usuarios (usuario, contrasenia, rol) VALUES (?, ?, 'usuario')");
        $query->execute([$usuario, $contrasenia]);
    }
}