<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('header', 'inicioSesion', 'footer');
?>
<?php include '../vistas_generales/header.php'; ?>

<form action="../controladores/ProcesarInicioSesion.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>

<?php include '../vistas_generales/footer.php'; ?>


