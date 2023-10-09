<?php
require_once "./app/views/libros.view.php";
require_once "./app/models/libros.model.php";

class LibrosController {
    private $view, $model;

    public function __construct() {
        $this->view = new LibrosView();
        $this->model = new LibrosModel();
    }

    public function showLibros() {
        $libros = $this->model->getLibros();
        $this->view->renderLibros($libros);
    }

    public function showLibro($idLibro) {
        $libro = $this->model->getLibroPorId($idLibro);
        $this->view->renderLibro($libro);
    }
}