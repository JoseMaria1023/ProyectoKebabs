<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="../css/contacto.css">
</head>
<body>

    <div id="contenedor-contacto">
        <div class="contenedor-formulario">
            <h2>Envíanos un mensaje</h2>
            <form action="APIS/ApiCorreo.php" method="POST">
                <div class="Contenidos">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="Contenidos">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="email" required>
                </div>
                <div class="Contenidos">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" required>
                </div>
                <div class="Contenidos">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>
                <button type="submit" id="btn-enviar">Enviar</button>
            </form>
        </div>
        <div class="informacion-contacto">
            <h2>Información de contacto</h2>
            <p>Dirección: Calle Andujar 123, Jaen</p>
            <p>Teléfono: +34 922 22 22 22</p>
            <p>Correo electrónico: correo@gmail.com</p>
        </div>
    </div>

</body>
</html>
