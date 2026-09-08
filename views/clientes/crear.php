<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    
    </head>
<body>
<nav class="navbar">
    <div class="nav-content">
        <h1>📋 Sistema Registro de Clientes</h1>
        <div class="nav-info">BD: integradora</div>
    </div>
</nav>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>📝 Formulario de Registro</h2>
            <a href="" class="btn">← Volver a consulta</a>
        </div>

        

        <form id="formCliente"  method="POST" class="formulario" novalidate>
            <div class="grid-2">
                <div class="form-group">
                    <label>Nombres *</label>
                    <input type="text" id="nombres" name="nombres" placeholder="Jessy Agustin" required>
                    <span class="error" id="error-nombres"></span>
                </div>
                <div class="form-group">
                    <label>Apellidos *</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Baque Arcia" required>
                    <span class="error" id="error-apellidos"></span>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label>Cédula (10 dígitos numéricos) *</label>
                    <input type="text" id="cedula" name="cedula" maxlength="10" placeholder="0912345678" required>
                    <span class="error" id="error-cedula"></span>
                </div>
                <div class="form-group">
                    <label>Teléfono (10 dígitos numéricos) *</label>
                    <input type="text" id="telefono" name="telefono" maxlength="10" placeholder="0991234567" required>
                    <span class="error" id="error-telefono"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Email *</label>
                <input type="email" id="email" name="email" placeholder="clientes@ecotec.edu.ec" required>
                <span class="error" id="error-email"></span>
            </div>

            <div class="form-group">
                <label>Dirección *</label>
                <input type="text" id="direccion" name="direccion" placeholder="Av. 9 de Octubre y Boyacá, Guayaquil" required>
                <span class="error" id="error-direccion"></span>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Registrar en BD</button>
            </div>

            <div id="mensaje-global" class="alerta" style="display:none"></div>
        </form>
    </div>

    <div class="explicacion">
        <h3>Flujo MVC</h3>
        <p><strong>Jessy Baque Arcia</strong> Universidad Ecotec - Ingenieria de Sistemas Inteligentes</p>
    </div>
</div>


</body>
</html>