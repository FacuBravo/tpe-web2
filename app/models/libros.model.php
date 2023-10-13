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

    public function getLibrosPorAutor($id) {
        $query = $this->bd->prepare("SELECT * FROM libros WHERE id_autor = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLibrosPorGenero($genero) {
        $query = $this->bd->prepare("SELECT * FROM libros WHERE genero = ?");
        $query->execute([$genero]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getGeneros() {
        $query = $this->bd->prepare("SELECT genero FROM libros");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}