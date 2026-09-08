document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formCliente');
    const globalMsg = document.getElementById('mensaje-global');

    // Eliminar confirmación
    document.querySelectorAll('.btn-eliminar').forEach(b => {
        b.addEventListener('click', e => {
            if (!confirm('¿Eliminar este cliente de la BD integradora?')) e.preventDefault();
        });
    });

    if (!form) return;

    function error(campo, msg) {
        const input = document.getElementById(campo);
        const span = document.getElementById('error-' + campo);
        if (input) input.classList.add('error-input');
        if (span) span.textContent = msg;
    }
    function limpiar() {
        document.querySelectorAll('input').forEach(i => i.classList.remove('error-input'));
        document.querySelectorAll('.error').forEach(s => s.textContent = '');
        if (globalMsg) { globalMsg.style.display = 'none'; globalMsg.textContent = ''; }
    }

    form.addEventListener('submit', e => {
        limpiar();
        let errores = [];

        const nombres = document.getElementById('nombres').value.trim();
        const apellidos = document.getElementById('apellidos').value.trim();
        const cedula = document.getElementById('cedula').value.trim();
        const telefono = document.getElementById('telefono').value.trim();
        const email = document.getElementById('email').value.trim();
        const direccion = document.getElementById('direccion').value.trim();

        // 1. CAMPOS VACÍOS
        if (!nombres) { errores.push('Nombres vacío'); error('nombres','Obligatorio'); }
        if (!apellidos) { errores.push('Apellidos vacío'); error('apellidos','Obligatorio'); }
        if (!cedula) { errores.push('Cédula vacía'); error('cedula','Obligatorio'); }
        if (!telefono) { errores.push('Teléfono vacío'); error('telefono','Obligatorio'); }
        if (!email) { errores.push('Email vacío'); error('email','Obligatorio'); }
        if (!direccion) { errores.push('Dirección vacía'); error('direccion','Obligatorio'); }

        // 2. LONGITUD DE DATOS
        if (nombres && nombres.length < 3) { errores.push('Nombres mínimo 3'); error('nombres','Mínimo 3 letras'); }
        if (nombres && nombres.length > 80) { errores.push('Nombres muy largo'); error('nombres','Máx 80'); }
        if (apellidos && apellidos.length < 3) { errores.push('Apellidos mínimo 3'); error('apellidos','Mínimo 3 letras'); }
        if (direccion && direccion.length < 10) { errores.push('Dirección muy corta'); error('direccion','Mínimo 10 caracteres'); }

        // 3. CAMPOS NUMÉRICOS
        if (cedula && !/^\d+$/.test(cedula)) { errores.push('Cédula solo números'); error('cedula','Solo números'); }
        if (telefono && !/^\d+$/.test(telefono)) { errores.push('Teléfono solo números'); error('telefono','Solo números'); }

        // 4. VALORES INCORRECTOS - longitud exacta 10
        if (cedula && cedula.length !== 10) { errores.push('Cédula 10 dígitos'); error('cedula','Debe tener 10 dígitos'); }
        if (telefono && telefono.length !== 10) { errores.push('Teléfono 10 dígitos'); error('telefono','Debe tener 10 dígitos'); }
        if (telefono && !telefono.startsWith('09')) { errores.push('Teléfono debe empezar con 09'); error('telefono','Debe empezar con 09'); }

        // 5. CORREO ELECTRÓNICO
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !regexEmail.test(email)) { errores.push('Email inválido'); error('email','Formato: ejemplo@correo.com'); }

        if (errores.length > 0) {
            e.preventDefault();
            if (globalMsg) {
                globalMsg.textContent = '❌ Corrige ' + errores.length + ' error(es): ' + errores.join(', ');
                globalMsg.className = 'alerta error';
                globalMsg.style.display = 'block';
                globalMsg.scrollIntoView({behavior:'smooth'});
            }
        }
    });

    // Solo números en cédula y teléfono
    ['cedula','telefono'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', function(){ this.value = this.value.replace(/\D/g,''); });
    });
});
