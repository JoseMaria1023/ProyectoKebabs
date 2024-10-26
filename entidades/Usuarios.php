<?php

class Usuarios{
    private $id;
    private $nombre;
    private $email;
    private $direccion;
    private $rol;
    
    public function __construct($id,$nombre, $email, $direccion, $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->rol = $rol;

    }
    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getRol(){
        return $this->rol;
    }
}

?>