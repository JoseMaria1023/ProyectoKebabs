<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('HeaderAdmin', 'EditarKebab', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Kebab</title>
</head>
<body>
    <h1>Editar Kebab</h1>
    
    <form id="form-editar-Kebab">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="" required>
        <br>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" value="" required>
        <br>

        <label for="Precio">Precio:</label>
        <input type="decimal" id="precio" name="precio" value="" required>
        <br>
        <input type="hidden" id="id-kebab" name="id_kebab" value="">

        <button type="submit">Guardar Cambios</button>
    </form>

    <script src="../Js/EditarKebab.js"></script>
</body>
</html>

<?php include '../vistas_generales/footer.php'; ?>
