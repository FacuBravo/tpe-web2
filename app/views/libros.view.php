<?php

require_once './app/helpers/views.helper.php';

class LibrosView {
    public function renderLibros($libros) {
        $titulo = "Libreria";
        ViewsHelper::header($titulo);
        require_once "./templates/lista-libros.phtml";
        ViewsHelper::footer();
    }

    public function renderLibro($libro, $autor) {
        $titulo = $libro->titulo;
        ViewsHelper::header($titulo);
        require_once "./templates/libro.phtml";
        ViewsHelper::footer();
    }

    public function renderAutor($autor, $libros) {
        $titulo = $autor->nombre;
        ViewsHelper::header($titulo);
        require_once "./templates/lista-libros.phtml";
        ViewsHelper::footer();
    }
}