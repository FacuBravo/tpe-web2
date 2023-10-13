<?php

class LibrosView {
    public function renderLibros($libros) {
        $titulo = "Libreria";
        $this->header($titulo);
        require_once "./templates/listaLibros.phtml";
        $this->footer();
    }

    public function renderLibro($libro, $autor) {
        $titulo = $libro->titulo;
        $this->header($titulo);
        require_once "./templates/libro.phtml";
        $this->footer();
    }

    public function renderAutor($autor, $libros) {
        $titulo = $autor->nombre;
        $this->header($titulo);
        require_once "./templates/listaLibros.phtml";
        $this->footer();
    }

    public function renderLibrosPorGenero($libros, $titulo) {
        $this->header($titulo);
        require_once "./templates/listaLibros.phtml";
        $this->footer();
    }

    public function renderAutores($autores) {
        $titulo = "Autores";
        $this->header($titulo);
        require_once "./templates/autores.phtml";
        $this->footer();
    }

    public function renderGeneros($generos) {
        $titulo = "Generos";
        $this->header($titulo);
        require_once "./templates/generos.phtml";
        $this->footer();
    }



    private function header($titulo) {
        require_once "./templates/header.phtml";
    }

    private function footer() {
        require_once "./templates/footer.phtml";
    }
}