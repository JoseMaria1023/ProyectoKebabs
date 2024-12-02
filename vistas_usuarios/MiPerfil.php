<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/MiPerfil.css">
    <link rel="stylesheet" href="../css/MiPerfil.css">
</head>
<body>
    <div class="contenedor-perfil">
        <div class="perfil-header">
            <div class="foto-perfil">
                <table>
                    <tr>
                        <td id="celdaFoto"></td>
                    </tr>
                </table>
            </div>
            <h1 id="nombreUsuario">Nombre del Usuario</h1>
        </div>
        <div class="perfil-contenido">
            <h2>Detalles del Usuario</h2>
            <div id="detallesUsuario" class="detalles-usuario">
            </div>
        </div>
        <div class="perfil-botones">
            <button id="editarPerfil" class="boton">Editar Perfil</button>
            <button id="cerrarSesion" class="boton">Cerrar Sesión</button>
        </div>
    </div>
    <script src="../Js/MiPerfil.js"></script>
</body>
</html>
