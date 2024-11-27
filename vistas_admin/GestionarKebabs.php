<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'GestionarKebab', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Kebabs</title>
</head>
<body>
    <h1>Gestión de Kebabs</h1>
    <table id="tabla-Kebabs">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="../Js/GestionarKebabs.js"></script>
</body>
</html>
<?php include '../vistas_generales/footer.php'; ?>
