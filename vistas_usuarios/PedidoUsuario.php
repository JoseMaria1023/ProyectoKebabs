<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Realizar Pedido</h1>

    <form id="form-pedido">
        <label for="usuario">ID de Usuario:</label>
        <input type="number" id="usuario" name="usuario_id" required>

        <h2>Selecciona tus kebabs</h2>
        <div id="productos">
            <div class="producto">
                <input type="checkbox" id="kebab1" name="kebabs[]" value="1">
                <label for="kebab1">Kebab Clásico - $5.00</label>
                <input type="number" name="cantidad[1]" placeholder="Cantidad" min="1" max="10">
            </div>
            <div class="producto">
                <input type="checkbox" id="kebab2" name="kebabs[]" value="2">
                <label for="kebab2">Kebab Especial - $6.50</label>
                <input type="number" name="cantidad[2]" placeholder="Cantidad" min="1" max="10">
            </div>
        </div>

        <button type="submit">Enviar Pedido</button>
    </form>

    <script src="pedido.js"></script>
</body>
</html>