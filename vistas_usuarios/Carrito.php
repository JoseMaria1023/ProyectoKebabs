<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('headerLogueado', 'Carrito', 'footer');
?>
<?php include '../vistas_usuarios/HeaderLogueado.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>

    <div id="carrito-container">
    </div>

    <div id="total">
        <p>Total: <span id="total-price">0</span>€</p>
    </div>

    <button id="realizar-pedido">Realizar Pedido</button>

    <script src="../Js/carrito.js"></script>
</body>
</html>
<?php include '../vistas_generales/footer.php'; ?>