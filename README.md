# Actividad Integradora 3
### Sistemas de Registro de Clientes.

Tecnologia usada: HTML, PHP, CSS, PHP

Gestor BD: MySQL

Nombre BD: integradora

Usuario: root

sin clave.

```
ActIntegra3/
├── index.php                 ← front controller
├── config/
│   └── conexion.php          ← PDO Singleton root sin clave
├── controllers/
│   └── ClienteController.php ← coordina vista-modelo
├── models/
│   └── Cliente.php           ← INSERT, SELECT, DELETE
├── views/
│   └── clientes/
│       ├── crear.php         ← formulario 6 campos
│       └── listar.php        ← tabla HTML consulta
├── css/
│   └── estilos.css           ← Grid + Flexbox responsive
├── js/
│   └── script.js             ← validaciones JS (5 tipos)
└── sql/
    └── integradora.sql       ← BD integradora + tabla clientes
```