<?php

class Usuarios {
    private $id;
    private $nombre;
    private $contrasenia;
    private $email;
    private $direccion;
    private $rol;
    private $foto;
    
    public function __construct($nombre = "", $contrasenia = "", $email = "",  $direccion = "", $rol = "", $foto = "") {
        $this->nombre = $nombre;
        $this->contrasenia = $contrasenia;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->rol = $rol;
        $this->foto = $foto;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
}

?>
