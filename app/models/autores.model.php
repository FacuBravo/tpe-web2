<?php

require_once "config.php";

class AutoresModel {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=' . BD_HOST . ';dbname=' . BD_NAME . ';charset=' . BD_CHARSET . '', '' . BD_USER . '', '' . BD_PASS . '');
    }

    public function getAutorPorId($id) {
        $query = $this->bd->prepare("SELECT * FROM autores WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAutores() {
        $query = $this->bd->prepare("SELECT * FROM autores");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}