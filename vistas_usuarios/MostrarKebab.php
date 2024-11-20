<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('headerLogueado', 'MostrarKebab', 'footer');
?>
<?php include '../vistas_usuarios/HeaderLogueado.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Kebabs</title>
    <link rel="stylesheet" href="../css/MostrarKebab.css">
</head>
<body>
    <h1>Lista de Ingredientes de Kebabs</h1>
    <div class="container" id="kebab-container"></div>
    <script src="../Js/MostrarKebab.js"></script>
</body>
</html>
<?php include '../vistas_generales/footer.php'; ?>