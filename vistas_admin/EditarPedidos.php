<link rel="stylesheet" href="../css/GestionarPedidos.css">
<link rel="stylesheet" href="css/GestionarPedidos.css">
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
    <input type="hidden" id="id-pedido" name="id">
    <label for="estado">Estado del pedido:</label>
    <select id="estado" name="estado">
        <option value="Recibido">Pendiente</option>
        <option value="En preparacion">En preparación</option>
        <option value="Listo">Listo</option>
        <option value="Enviado">Enviado</option>
    </select>
    <button type="submit">Actualizar pedido</button>
</form>

    <script src="../Js/EditarPedido.js"></script>
    <script src="Js/EditarPedido.js"></script>

</body>
</html>

