
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online de Kebabs</title>
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../imagenes/KebabLogo.png" alt="Logo de la Tienda de Kebabs"> 
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li>
                    <a href="menu.php">Menú</a>
                    <ul>
                        <li><a href="vistas_usuarios/KebabPersonalizado.php">Kebab Personalizado</a></li>
                    </ul>
                </li>           
                <li><a href="pedidos.php">Mis Pedidos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="monedero.php">Saldo: €<span id="saldo-usuario"><?= $saldoUsuario ?></span></a></li> 
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="logout.php" class="button">Cerrar Sesión</a></li> 
            </ul>
        </nav>
    </header>
</body>
</html>
<script src="../Js/MostrarSaldo.js"></script>
