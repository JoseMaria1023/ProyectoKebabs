<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'GestionarPedidos', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Pedidos</title>
</head>
<body>
    <h1>Gestión de Pedidos</h1>
    <table id="tabla-Pedidos">
        <thead>
            <tr>
                <th>usuario_id</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="../Js/GestionarPedidos.js"></script>
</body>
</html>
<?php include '../vistas_generales/footer.php'; ?>
