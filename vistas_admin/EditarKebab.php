<link rel="stylesheet" href="../css/EditarKebab.css">
<link rel="stylesheet" href="css/EditarKebab.css">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Kebab</title>
</head>
<body>
    <h1>Editar Kebab</h1>
    
    <form id="form-editar-kebab">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="">
    <br>

    <label for="descripcion">Descripcion:</label>
    <input type="text" id="descripcion" name="descripcion" value="">
    <br>

    <label for="precio_base">Precio:</label>
    <input type="number" id="precio_base" name="precio_base" value="" step="0.01">
    <br>

    <input type="hidden" id="id-kebab" name="id-kebab" value="">

    <button type="submit">Guardar Cambios</button>
</form>

    <script src="../Js/EditarKebab.js"></script>
    <script src="Js/EditarKebab.js"></script>

</body>
</html>
