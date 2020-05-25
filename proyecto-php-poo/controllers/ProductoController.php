<?php

require_once 'models/Producto.php';

class ProductoController {

    public function index() {
        require_once 'views/producto/destacados.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
              
        require_once 'views/producto/gestion.php';
        
    }
        public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }
    
    
    public function save() {
        Utils::isAdmin();
        if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['stock'])){
            $producto = new Producto();
            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setCategoria_id($_POST['categoria']);
            $producto->setPrecio($_POST['precio']);
            $producto->setStock($_POST['stock']);
            $producto->setOferta($_POST['oferta']);
            $producto->setImagen($_POST['imagen']);

            $producto->save();
        }
        header("location:".base_url."producto/gestion");
        
    }
}


