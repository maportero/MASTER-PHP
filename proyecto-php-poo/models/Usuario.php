<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $password;
    private $email;
    private $rol;
    private $imagen;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
            
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT,['cost'=>4]);
    }

    function getEmail() {
        return $this->email;
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function save(){
        
        $sql="INSERT INTO usuarios VALUES (null,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null)";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            
            $result=true;
        }
        
        return $result;
    }
    
    public function login(){
        $email=$this->email;
        $password=$this->password;
        $login=false;
        $sql="SELECT * FROM usuarios WHERE email='$email'";
        
        $result=$this->db->query($sql);

        if ($result && $result->num_rows ==1){
            
            $usuario = $result->fetch_object();
  
            $verify = password_verify($password, $usuario->password);

            
            if($verify){
     
                return $usuario;
            } 
            
              
        }
        
        return $login;        
        
        
    }
    
    
    
    
}