<?php

class LibrosView {
    public function renderLibros($libros) {
        $titulo = "Libreria";
        require_once "./templates/header.phtml";
        require_once "./templates/home.phtml";
        require_once "./templates/footer.phtml";
    }

    public function renderLibro($libro, $autor) {
        $titulo = $libro->titulo;
        require_once "./templates/header.phtml";
        require_once "./templates/libro.phtml";
        require_once "./templates/footer.phtml";
    }
}