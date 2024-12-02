<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="css/MisPedidos.css">
    <link rel="stylesheet" href="../css/MisPedidos.css">
</head>
<body>
    <div class="contenedor-pedidos">
        <div class="pedidos-header">
            <div class="foto-perfil">
                <img id="fotoUsuario" src="default-profile.png" alt="Foto de perfil">
            </div>
            <h1 id="nombreUsuario">Nombre del Usuario</h1>
        </div>

        <div class="pedidos-contenido">
            <h2>Mis Pedidos</h2>
            <div id="listaPedidos" class="lista-pedidos">
            </div>
        </div>

        <button id="descargar-pdf">Descargar Pedidos en PDF</button>
    </div>

    <script src="../Js/MisPedidos.js"></script>
</body>
</html>
