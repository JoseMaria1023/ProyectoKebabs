<?php

class Usuarios {
    private $nombre;
    private $contrasenia;
    private $email;
    private $direccion;
    private $rol;
    
    public function __construct($nombre = "", $contrasenia = "", $email = "",  $direccion = "", $rol = "") {
        $this->nombre = $nombre;
        $this->contrasenia = $contrasenia;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->rol = $rol;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getRol() {
        return $this->rol;
    }
}


?>