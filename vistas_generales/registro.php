<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('header', 'registro', 'footer');
?>
<?php include '../vistas_generales/Header.php'; ?>
<link rel="stylesheet" href="./css/registro.css">
    <form action="../APIS/ApiUsuarios.php" method="post" enctype="multipart/form-data">
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

        <div class="foto">
            <label for="foto">Foto del Usuario:</label>
            <input type="file" name="foto" id="foto">
         </div>

        <button type="submit">Registrarse</button>
    </form>
<?php include '../vistas_generales/footer.php'; ?>

