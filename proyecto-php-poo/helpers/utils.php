<?php

class Utils{
    
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name]= null;
            unset($_SESSION[$name]);
        }
        return $name;
    }
    
    public static function isAdmin() {
        if(isset($_SESSION['admin']) && $_SESSION['admin'] ){
            return true;
        }else{
            header("location:".base_url);
        }
        
    }
    
    public static function showCategoria() {
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        return $categorias;
    }
}
