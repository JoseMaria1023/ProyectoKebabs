<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'GestionarUsuarios', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <table id="tabla-usuarios">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Rol</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="../Js/GestionarUsuarios.js"></script>
</body>
</html>
<?php include '../vistas_generales/footer.php'; ?>
