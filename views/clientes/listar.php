<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - BD integradora</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-content">
        <h1>📋 Sistema Registo de Clientes</h1>
        <div class="nav-info">BD: integradora</div>
    </div>
</nav>

<div class="container">
    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'ok'): ?>
        <div class="alerta exito">✅ Cliente registrado correctamente en BD integradora</div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h2>📊 Consulta de Registros</h2>
            <a href="index.php?accion=crear" class="btn btn-primary">+ Nuevo Cliente</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= htmlspecialchars($c['nombres']) ?></td>
                            <td><?= htmlspecialchars($c['apellidos']) ?></td>
                            <td><?= htmlspecialchars($c['cedula']) ?></td>
                            <td><?= htmlspecialchars($c['email']) ?></td>
                            <td><?= htmlspecialchars($c['telefono']) ?></td>
                            <td><?= htmlspecialchars($c['direccion']) ?></td>
                            <td><a href="index.php?accion=eliminar&id=<?= $c['id'] ?>" class="btn btn-sm btn-danger btn-eliminar">Eliminar</a></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="8" style="text-align:center">No hay registros. <a href="index.php?accion=crear">Registrar uno</a></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="explicacion">
        <h3>Flujo MVC</h3>
        <p><strong>Jessy Baque Arcia</strong> Universidad Ecotec - Ingenieria de Sistemas Inteligentes</p>
    </div>
</div>

<script src="js/scripts.js"></script>
</body>
</html>