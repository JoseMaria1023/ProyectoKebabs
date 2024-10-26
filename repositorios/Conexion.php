<?php
class Conexion {
    private static $con = null;

    public static function getConection(): PDO {
        if (self::$con === null) {
            self::$con = new PDO("mysql:host=localhost;dbname=Proyecto_Kebabs", "root", "root");
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$con;
    }
}
?>