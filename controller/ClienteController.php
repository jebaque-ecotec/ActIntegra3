<?php

class ClienteController {
    private $modelo;

    public function __construct() {
        require_once "models/Cliente.php";
        $this->modelo = new Cliente();
    }

    // Acción: Listar - Consulta de registros
    public function listar() {
        $clientes = $this->modelo->obtenerTodos(); // Controlador pide al Modelo
        require_once "views/clientes/listar.php"; // Controlador envía a Vista
    }

    // Acción: Mostrar formulario
    public function crear() {
        require_once "views/clientes/crear.php";
    }

    // Acción: Guardar - Registro mediante MVC (Punto 7)
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 1. Controlador recibe datos enviados desde la Vista
            $datos = [
                'nombres' => trim($_POST['nombres']),
                'apellidos' => trim($_POST['apellidos']),
                'cedula' => trim($_POST['cedula']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
                'direccion' => trim($_POST['direccion'])
            ];

            // Validación backend adicional
            if ($this->modelo->existeCedula($datos['cedula'])) {
                $mensaje = "La cédula ya existe";
                $tipo = "error";
                require_once "views/clientes/crear.php";
                return;
            }

            // 2. Modelo realiza INSERT
            if ($this->modelo->insertar($datos)) {
                // 3. Vista muestra resultado
                header("Location: index.php?accion=listar&mensaje=ok");
                exit;
            }
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->modelo->eliminar($_GET['id']);
        }
        header("Location: index.php?accion=listar");
        exit;
    }
}
?>
