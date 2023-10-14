<?php

class AutoresController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        AuthHelper::init();
        $this->view = new LibrosView();
        $this->modelLibros = new LibrosModel();
        $this->modelAutores = new AutoresModel();
    }

    public function showAutor ($idAutor) {
        $autor = $this->modelAutores->getAutorPorId($idAutor);
        $libros = $this->modelLibros->getLibrosPorAutor($idAutor);
        $this->view->renderAutor($autor, $libros);
    }

    public function eliminarAutor($idAutor) {
        AuthHelper::verifyPermisos();
        $libros = $this->modelLibros->getLibrosPorAutor($idAutor);

        if (!$libros) {
            $this->modelAutores->eliminarAutor($idAutor);
        }

        header("Location:" . BASE_URL . "autores");
    }
}