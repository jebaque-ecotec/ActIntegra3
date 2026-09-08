<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'integradora');
define('DB_USER', 'root');
define('DB_PASS', '');

class Conexion {
    private static $instancia = null;
    private $conexion;

    private function __construct() {
        try {
            $this->conexion = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch(PDOException $e) {
            die("Error de conexión BD integradora: " . $e->getMessage() . "<br>Verifica que creaste la BD integradora en phpMyAdmin e importaste integradora.sql");
        }
    }

    public static function getConexion() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia->conexion;
    }
}
?>
