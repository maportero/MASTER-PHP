<?php
require_once 'models/Categoria.php';

class CategoriaController {

    public function index() {

        Utils::isAdmin();
        
        $categoria = new Categoria();
        
        $categorias = $categoria->getAll();
      
        require_once 'views/categoria/index.php';
        
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    
    public function save() {
        Utils::isAdmin();
        if (isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("location:".base_url."categoria/index");
        
    }
}


