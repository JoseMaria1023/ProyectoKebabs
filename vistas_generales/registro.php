<link rel="stylesheet" href="css/registro.css">
<div class="registro-container">
    <div class="form-container">
        <div class="left">
            <h2>Registro de Usuario</h2>
            <form action="APIS/ApiUsuarios.php" method="post" enctype="multipart/form-data">
                <div class="foto">
                    <label for="foto">Seleccionar Imagen</label>
                    <input type="file" name="foto" id="foto" />
                    <div id="preview-container" class="image-preview">
                        <img id="preview" >
                    </div>
                </div>
        </div>
        <div class="right">
            <div class="informacion-container">
                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="contrasenia" required>
                </div>

                <div class="form-group">
                    <label for="confirmar">Confirmar contraseña:</label>
                    <input type="password" id="confirmar" name="confirmar" required>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
            </div>
            <button type="submit">Registrarse</button>
        </form>
        </div>
    </div>
</div>
<script src="Js/PreviewImagen.js"></script>
