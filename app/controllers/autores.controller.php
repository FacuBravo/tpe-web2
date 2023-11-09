<?php

require_once "./app/helpers/auth.helper.php";
require_once "./app/views/libros.view.php";
require_once "./app/views/secciones.view.php";
require_once "./app/models/autores.model.php";
require_once "./app/models/libros.model.php";

class AutoresController {
    private $viewLibros, $viewSecciones, $modelLibros, $modelAutores;

    public function __construct() {
        AuthHelper::init();
        $this->viewLibros = new LibrosView();
        $this->modelLibros = new LibrosModel();
        $this->modelAutores = new AutoresModel();
        $this->viewSecciones = new SeccionesView();
    }

    public function showAutor ($idAutor) {
        $autor = $this->modelAutores->getAutor($idAutor);
        $libros = $this->modelLibros->getLibrosPorAutor($idAutor);
        $this->viewLibros->renderAutor($autor, $libros);
    }

    public function editar() {
        AuthHelper::verifyPermisos();

        $id = explode("/", $_GET["action"])[1];
        $nombreAutor = $_POST["nombreAutor"];
        $descripcionAutor = $_POST["descripcionAutor"];

        if (empty($nombreAutor) || empty($descripcionAutor)) {
            $this->viewSecciones->renderCargarAutor("Llenar todos los campos");
            die();
        }
        
        $this->modelAutores->modificarAutor($id, $nombreAutor, $descripcionAutor);
        
        header("Location:" . BASE_URL . "autores");
    }

    public function nuevoAutor() {
        AuthHelper::verifyPermisos();
        
        $nombreAutor = $_POST["nombreAutor"];
        $descripcionAutor = $_POST["descripcionAutor"];

        if (empty($nombreAutor) || empty($descripcionAutor)) {
            $this->viewSecciones->renderCargarAutor("Llenar todos los campos");
            die();
        }
        
        $this->modelAutores->agregarAutor($nombreAutor, $descripcionAutor);
        $this->viewSecciones->renderCargarAutor("Autor agregado exitosamente");
    }

    public function eliminarAutor($idAutor) {
        AuthHelper::verifyPermisos();
        $libros = $this->modelLibros->getLibrosPorAutor($idAutor);

        if (!$libros) {
            $this->modelAutores->eliminarAutor($idAutor);
            $autores = $this->modelAutores->getAutores();
            $this->viewSecciones->renderAutores($autores);
        } else {
            $autores = $this->modelAutores->getAutores();
            $this->viewSecciones->renderAutores($autores, "No se pudo eliminar porque el autor tiene libros vinculados");
        }
    }
}