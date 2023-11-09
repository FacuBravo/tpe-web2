<?php

require_once "./app/helpers/auth.helper.php";
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
        $libro = $this->modelLibros->getLibro($idLibro);
        $autor = $this->modelAutores->getAutor($libro->id_autor); 
        $this->view->renderLibro($libro, $autor);
    }

    public function nuevoLibro() {
        AuthHelper::verifyPermisos();
        $autores = $this->modelAutores->getAutores();

        $inputs = [$_POST["titulo"], $_POST["genero"], $_POST["descripcion"], $_POST["precio"], $_POST["autor"]];

        if ($this->comprobarInputs($inputs)) {
            $this->viewSecciones->renderCargarLibro($autores, null, "Llenar todos los campos");
            die();
        }

        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $idAutor = $_POST["autor"];
        $nombreAutor = "";
        $descripcionAutor = "";

        if ($idAutor == "otro") {
            $nombreAutor = $_POST["nombreAutor"];
            $descripcionAutor = $_POST["descripcionAutor"];

            if (empty($nombreAutor) || empty($descripcionAutor)) {
                $this->viewSecciones->renderCargarLibro($autores, null, "Llenar todos los campos");
                die();
            }

            $idAutor = ($autores[count($autores) - 1]->id) + 1;
            
            $this->modelAutores->agregarAutor($idAutor, $nombreAutor, $descripcionAutor);
        }

        $this->modelLibros->agregarLibro($titulo, $genero, $descripcion, $precio, $idAutor);

        $autores = $this->modelAutores->getAutores();
        $this->viewSecciones->renderCargarLibro($autores, null, "Libro agregado exitosamente");
    }

    public function editar() {
        AuthHelper::verifyPermisos();
        $autores = $this->modelAutores->getAutores();

        $id = explode("/", $_GET["action"])[1];
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $idAutor = $_POST["autor"];
        $nombreAutor = "";
        $descripcionAutor = "";

        $inputs = [$titulo, $genero, $descripcion, $precio, $idAutor];

        if ($this->comprobarInputs($inputs)) {
            $this->viewSecciones->renderCargarLibro($autores, null, "Llenar todos los campos");
            die();
        }

        if ($idAutor == "otro") {
            $nombreAutor = $_POST["nombreAutor"];
            $descripcionAutor = $_POST["descripcionAutor"];

            if (empty($nombreAutor) || empty($descripcionAutor)) {
                $this->viewSecciones->renderCargarLibro($autores, null, "Llenar todos los campos");
                die();
            }

            $idAutor = ($autores[count($autores) - 1]->id) + 1;
            
            $this->modelAutores->agregarAutor($idAutor, $nombreAutor, $descripcionAutor);
        }

        $this->modelLibros->modificarLibro($id, $titulo, $genero, $idAutor, $descripcion, $precio);

        header("Location:" . BASE_URL . "home");
    }

    public function eliminarLibro($id) {
        AuthHelper::verifyPermisos();
        $this->modelLibros->eliminarLibro($id);
        header("Location:" . BASE_URL);
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
}