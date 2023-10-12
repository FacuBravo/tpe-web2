<?php

require_once "config.php";

class LibrosModel {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=' . BD_HOST . ';dbname=' . BD_NAME . ';charset=' . BD_CHARSET . '', '' . BD_USER . '', '' . BD_PASS . '');
    }

    public function getLibros() {
        $query = $this->bd->prepare("SELECT * FROM libros");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLibroPorId($id) {
        $query = $this->bd->prepare("SELECT * FROM libros WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}