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

    public function agregarLibro($titulo, $genero, $descripcion, $precio, $autor) {
        $query = $this->bd->prepare("INSERT INTO libros (titulo, genero, id_autor, descripcion, precio) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$titulo, $genero, $autor, $descripcion, $precio]);
    }

    public function modificarTitulo($id, $titulo) {
        $query = $this->bd->prepare("UPDATE libros SET titulo = ? WHERE id = ?");
        $query->execute([$titulo, $id]);
    }

    public function modificarGenero($id, $genero) {
        $query = $this->bd->prepare("UPDATE libros SET genero = ? WHERE id = ?");
        $query->execute([$genero, $id]);
    }
    
    public function modificarDescripcion($id, $descripcion) {
        $query = $this->bd->prepare("UPDATE libros SET descripcion = ? WHERE id = ?");
        $query->execute([$descripcion, $id]);
    }

    public function modificarPrecio($id, $precio) {
        $query = $this->bd->prepare("UPDATE libros SET precio = ? WHERE id = ?");
        $query->execute([$precio, $id]);
    }

    public function modificarAutor($id, $idAutor) {
        $query = $this->bd->prepare("UPDATE libros SET id_autor = ? WHERE id = ?");
        $query->execute([$idAutor, $id]);
    }
}