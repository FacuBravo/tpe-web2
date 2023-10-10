<?php

class AutoresModel {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=libreria;charset=utf8', 'root', '');
    }

    public function getAutorPorId($id) {
        $query = $this->bd->prepare("SELECT * FROM autores WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}