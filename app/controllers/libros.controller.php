<?php
require_once "./app/views/libros.view.php";
require_once "./app/models/libros.model.php";
require_once "./app/models/autores.model.php";

class LibrosController {
    private $view, $modelLibros, $modelAutores;

    public function __construct() {
        AuthHelper::init();
        $this->view = new LibrosView();
        $this->modelLibros = new LibrosModel();
        $this->modelAutores = new AutoresModel();
    }

    public function showLibros() {
        $libros = $this->modelLibros->getLibros();
        $this->view->renderLibros($libros);
    }

    public function showLibro($idLibro) {
        $libro = $this->modelLibros->getLibroPorId($idLibro);
        $autor = $this->modelAutores->getAutorPorId($libro->id_autor); 
        $this->view->renderLibro($libro, $autor);
    }

    public function showAutor ($idAutor) {
        $autor = $this->modelAutores->getAutorPorId($idAutor);
        $libros = $this->modelLibros->getLibrosPorAutor($idAutor);
        $this->view->renderAutor($autor, $libros);
    }

    public function showGenero($genero) {
        $libros = $this->modelLibros->getLibrosPorGenero($genero);
        $this->view->renderLibrosPorGenero($libros, $genero);
    }
}