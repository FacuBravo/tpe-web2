<?php

require_once './app/helpers/views.helper.php';

class SeccionesView {
    public function renderGeneros($generos) {
        $titulo = "Generos";
        ViewsHelper::header($titulo);
        require_once "./templates/generos.phtml";
        ViewsHelper::footer();
    }

    public function renderAutores($autores) {
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
}