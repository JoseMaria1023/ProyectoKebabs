

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ingredientes</title>
    <link rel="stylesheet" href="../css/EditarIngredientes.css">
    <link rel="stylesheet" href="css/EditarIngredientes.css">
</head>
<body>
    
    <form id="form-editar-ingredientes">
    <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="" required>
        <br>
        <label for="Precio">Precio:</label>
        <input type="number" id="Precio" name="Precio" value="" step="0.01" required>
        <br>

        <input type="hidden" id="id-ingredientes" name="id_ingredientes" value="" >

        <button type="submit">Guardar Cambios</button>
    </form>

    <script src="../Js/EditarIngredientes.js"></script>
    <script src="Js/EditarIngredientes.js"></script>

</body>
</html>

