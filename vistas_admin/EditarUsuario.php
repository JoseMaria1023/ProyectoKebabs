<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'EditarUsuario', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
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

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="usuario">Usuario</option>
            <option value="admin">Administrador</option>
        </select>
        <br>
        <input type="hidden" id="id-usuario" name="id_usuario" value="">

        <button type="submit">Guardar Cambios</button>
    </form>

    <script src="../Js/EditarUsuario.js"></script>
</body>
</html>

<?php include '../vistas_generales/footer.php'; ?>
