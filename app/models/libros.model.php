<?php

class LibrosModel {
    private $bd;

    public function __construct() {
        $this->bd = new PDO('mysql:host=localhost;dbname=libreria;charset=utf8', 'root', '');
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