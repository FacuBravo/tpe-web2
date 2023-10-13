<?php
require_once "./app/views/libros.view.php";
require_once "./app/views/secciones.view.php";
require_once "./app/models/libros.model.php";
require_once "./app/models/autores.model.php";

class LibrosController {
    private $view, $viewSecciones, $modelLibros, $modelAutores;

    public function __construct() {
        AuthHelper::init();
        $this->view = new LibrosView();
        $this->viewSecciones = new SeccionesView();
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

    public function nuevoLibro() {
        $autores = $this->modelAutores->getAutores();
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $idAutor = $_POST["autor"];
        $nombreAutor = "";
        $descripcionAutor = "";

        $inputs = [$titulo, $genero, $descripcion, $precio, $idAutor];

        if ($this->comprobarInputs($inputs)) {
            $this->viewSecciones->renderCargarLibro($autores, "Llenar todos los campos");
        }

        if ($idAutor == "otro") {
            $nombreAutor = $_POST["nombreAutor"];
            $descripcionAutor = $_POST["descripcionAutor"];

            if (empty($nombreAutor) || empty($descripcionAutor)) {
                $this->viewSecciones->renderCargarLibro($autores, "Llenar todos los campos");
            }

            $idAutor = ($autores[count($autores) - 1]->id) + 1;
            
            $this->modelAutores->agregarAuto($idAutor, $nombreAutor, $descripcionAutor);
        }

        $this->modelLibros->agregarLibro($titulo, $genero, $descripcion, $precio, $idAutor);

        $autores = $this->modelAutores->getAutores();
        $this->viewSecciones->renderCargarLibro($autores, "Libro agregado exitosamente");
    }

    private function comprobarInputs($inputs) {
        $cuenta = 0;

        foreach ($inputs as $input) {
            if (empty($input)) {
                $cuenta++;
            }
        }

        return $cuenta > 0;
    }

    public function editar() {
        
    }
}