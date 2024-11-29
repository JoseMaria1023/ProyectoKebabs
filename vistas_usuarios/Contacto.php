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

    <div class="mapa-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6306.748844295171!2d-3.807186387902698!3d37.781264171866894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6dd71774e45867%3A0x99df1e0032930534!2sIES%20Fuentezuelas!5e0!3m2!1ses!2ses!4v1732815208914!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>

</body>
</html>

