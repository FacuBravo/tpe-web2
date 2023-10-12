<?php

class LibrosView {
    public function renderLibros($libros) {
        $titulo = "Libreria";
        require_once "./templates/header.phtml";
        require_once "./templates/listaLibros.phtml";
        require_once "./templates/footer.phtml";
    }

    public function renderLibro($libro, $autor) {
        $titulo = $libro->titulo;
        require_once "./templates/header.phtml";
        require_once "./templates/libro.phtml";
        require_once "./templates/footer.phtml";
    }

    public function renderAutor($autor, $libros) {
        $titulo = $autor->nombre;
        require_once "./templates/header.phtml";
        require_once "./templates/listaLibros.phtml";
        require_once "./templates/footer.phtml";
    }

    public function renderLibrosPorGenero($libros, $titulo) {
        require_once "./templates/header.phtml";
        require_once "./templates/listaLibros.phtml";
        require_once "./templates/footer.phtml";
    }
}