<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'EditarPedido', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
</head>
<body>
    <h1>Editar Pedido</h1>
    
    <form id="form-editar-Pedido">        
        <label for="Estado">Estado:</label>
        <select id="Estado" name="Estado" required>
            <option value="Recibido">Recibido</option>
            <option value="En preparacion">En preparacion</option>
            <option value="Completado">Completado</option>
            <option value="Enviado">Enviado</option>
        </select>
        <br>

        <input type="hidden" id="id-Pedido" name="id-Pedido" value="">

        <button type="submit">Guardar Cambios</button>
    </form>

    <script src="../Js/EditarPedido.js"></script>
</body>
</html>

<?php include '../vistas_generales/footer.php'; ?>
