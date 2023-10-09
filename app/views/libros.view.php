<?php

class LibrosView {
    public function renderLibros($libros) {
        require_once "./templates/header.phtml";
        require_once "./templates/home.phtml";
        require_once "./templates/footer.phtml";
    }

    public function renderLibro($libro) {
        require_once "./templates/header.phtml";
        echo $libro->titulo;
        echo $libro->descripcion;
        require_once "./templates/footer.phtml";
    }
}