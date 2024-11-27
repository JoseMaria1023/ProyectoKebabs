<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'GestionarIngredientes', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar ingredientes</title>
</head>
<body>
    <h1>Gestión de ingredientes</h1>
    <table id="tabla-ingredientes">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="../Js/GestionarIngredientes.js"></script>
</body>
</html>
<?php include '../vistas_generales/footer.php'; ?>
