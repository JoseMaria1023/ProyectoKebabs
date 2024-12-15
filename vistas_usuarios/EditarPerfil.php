<link rel="stylesheet" href="../css/EditarUsuario.css">
<link rel="stylesheet" href="css/EditarUsuario.css">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    
    <form id="form-editar-usuario">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" required>
        <br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="" required>
        <br>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>

    <script src="../Js/EditarPerfil.js"></script>
    <script src="Js/EditarPerfil.js"></script>

</body>
</html>

