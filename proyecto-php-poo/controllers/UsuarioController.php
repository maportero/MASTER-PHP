<?php

require_once 'models/Usuario.php';


class UsuarioController {

    public function index() {
        echo 'Controlador Usuarios, accion->index';
    }

    public function register() {
        require_once 'views/usuario/registro.php';
    }

    public function save() {
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
            $apellidos= isset($_POST['apellidos']) ? $_POST['apellidos']:false;
            $password= isset($_POST['password']) ? $_POST['password']:false;
            $email= isset($_POST['email']) ? $_POST['email']:false;

            if($nombre && $apellidos && $password && $email){
                $usuario = new Usuario();

                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setPassword($password);
                $usuario->setEmail($email);

                $result = $usuario->save();

                if ($result) {

                    $_SESSION['register'] = "completed";
                } else {
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        } else{
            $_SESSION['register']="failed";
        }
        header("location:".base_url."usuario/register");
    }

    public function login(){
        if (isset($_POST['email']) && isset($_POST['password'])){
            
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $result = $usuario->login();

            if ($result && is_object($result)){
                
                $_SESSION['identity']=$result;
                
                if ($result->rol == 'admin'){
                    
                    $_SESSION['admin']=true;
                }
                
            }else {
                
                $_SESSION['error_login']='Login fallido, ingrese los datos correctmante';
            }
            
            header("location:".base_url);
        }
        
        
    }
    
    public function logout() {
        if (isset($_SESSION['identity'])) {

           Utils::deleteSession('identity') ;   
        }
        
        if (isset($_SESSION['admin'])) {
        
           Utils::deleteSession('admin') ;   
        }

        header("location:".base_url);
    }

}
