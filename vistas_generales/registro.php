<link rel="stylesheet" href="css/registro.css">
<div class="gestion-ingredientes">
    <div class="container">
        <form action="APIS/ApiUsuarios.php" method="post" enctype="multipart/form-data">
            <div class="foto">
                <label for="foto">Seleccionar Imagen</label>
                <input type="file" name="foto" id="foto" />
                <div id="preview-container" class="image-preview">
                    <img id="preview" src="">
                </div>
            </div>

            <div class="informacion-container">
                <div>
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="contrasenia" required>
                </div>

                <div>
                    <label for="confirmar">Confirmar contraseña:</label>
                    <input type="password" id="confirmar" name="confirmar" required>
                </div>

                <div>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
            </div>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</div>
<script src="Js/PreviewImagen.js"></script>
