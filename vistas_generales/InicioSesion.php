<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('header', 'inicioSesion', 'footer');
?>
<?php include '../vistas_generales/header.php'; ?>

<form id="loginForm">
    <input type="email" id="email" name="email" placeholder="Email" required>
    <input type="password" id="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>

<?php include '../vistas_generales/footer.php'; ?>

<script src="../Js/Login.js"></script>
