<?php

class Database {

    private $hostname = "localhost";
    private $database = "usuarios";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    
    function conectar(){
        try{
            $conexion = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

            return $conexion;
        } catch(PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}
?>
