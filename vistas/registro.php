<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="./controladores/procesarRegistro.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="contrasenia" required>
        
        <label for="confirmar">Confirmar contraseña:</label>
        <input type="password" id="confirmar" name="confirmar" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <input type="hidden" name="rol" value="usuario">

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
