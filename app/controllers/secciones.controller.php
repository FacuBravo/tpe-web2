<?php

require_once "./app/views/secciones.view.php";
require_once "./app/models/libros.model.php";
require_once "./app/models/autores.model.php";

class SeccionesController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        AuthHelper::init();
        $this->view = new SeccionesView();
        $this->modelAutores = new AutoresModel();
        $this->modelLibros = new LibrosModel();
    }

    public function showAbout() {
        $this->view->renderAbout();
    }
    
    public function showAutores() {
        $autores = $this->modelAutores->getAutores();
        $this->view->renderAutores($autores);
    }

    public function showCargarLibro() {
        $autores = $this->modelAutores->getAutores();
        $this->view->renderCargarLibro($autores);
    }
}