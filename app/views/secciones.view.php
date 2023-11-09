<?php

require_once './app/helpers/views.helper.php';

class SeccionesView {
    public function renderGeneros($generos) {
        $titulo = "Generos";
        ViewsHelper::header($titulo);
        require_once "./templates/generos.phtml";
        ViewsHelper::footer();
    }

    public function renderAutores($autores, $mensaje = null) {
        $titulo = "Autores";
        ViewsHelper::header($titulo);
        require_once "./templates/autores.phtml";
        ViewsHelper::footer();
    }

    public function renderAbout() {
        $titulo = "About";
        ViewsHelper::header($titulo);
        require_once "./templates/about.phtml";
        ViewsHelper::footer();
    }

    public function renderCargarLibro($autores, $libro = null, $mensaje = null) {
        $titulo = "Nuevo libro";
        $action = "nuevoLibro";
        ViewsHelper::header($titulo);
        require_once "./templates/agregar-libro-form.phtml";
        ViewsHelper::footer();
    }

    public function renderCargarAutor($mensaje = null, $autor = null) {
        $titulo = "Nuevo autor";

        if ($autor == null) {
            $action = "nuevoAutor";
        } else {
            $action = "autorEditado/$autor->id";
        }

        ViewsHelper::header($titulo);
        require_once "./templates/agregar-autor.phtml";
        ViewsHelper::footer();
    }
    
    public function renderError($error, $img) {
        $titulo = "Error";
        ViewsHelper::header($titulo);
        require_once "./templates/error.phtml";
        ViewsHelper::footer();
    }
    
    public function renderFormEditarLibro($libro, $autores, $mensaje = null) {
        $titulo = "Editar libro";
        $action = "editarLibro";
        ViewsHelper::header($titulo);
        require_once "./templates/agregar-libro-form.phtml";
        ViewsHelper::footer();
    }
}