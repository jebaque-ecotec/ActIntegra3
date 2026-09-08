<?php

require_once "config/conexion.php";
require_once "controllers/ClienteController.php";

// Instancia del controlador principal
$controller = new ClienteController();

// Enrutamiento simple basado en ?accion=
$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    case 'listar':
    default:
        $controller->listar();
        break;
}
?>