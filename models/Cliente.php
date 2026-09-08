<?php

class Cliente {
    private $db;

    public function __construct() {
        // Usa la conexión independiente de config/conexion.php
        $this->db = Conexion::getConexion();
    }

    // CONSULTAR INFORMACIÓN 
    public function obtenerTodos() {
        $stmt = $this->db->query("SELECT * FROM clientes ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // INSERTAR REGISTROS
    public function insertar($datos) {
        $sql = "INSERT INTO clientes (nombres, apellidos, cedula, email, telefono, direccion) 
                VALUES (:nombres, :apellidos, :cedula, :email, :telefono, :direccion)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombres' => $datos['nombres'],
            ':apellidos' => $datos['apellidos'],
            ':cedula' => $datos['cedula'],
            ':email' => $datos['email'],
            ':telefono' => $datos['telefono'],
            ':direccion' => $datos['direccion']
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function existeCedula($cedula) {
        $stmt = $this->db->prepare("SELECT id FROM clientes WHERE cedula = ?");
        $stmt->execute([$cedula]);
        return $stmt->fetch() ? true : false;
    }
}
?>
