
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online de Kebabs</title>
    <link rel="stylesheet" href="../css/headerLogueado.css">
    <link rel="stylesheet" href="css/headerLogueado.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../imagenes/KebabLogo.png" alt="Logo de la Tienda de Kebabs"> 
        </div>
        <nav>
            <ul>
                <li><a href="?menuLogin=inicio">Inicio</a></li>
                <li>
                    <a href="?menuLogin=mostrarkebab">Menú</a>
                    <ul>
                        <li><a href="?menuLogin=kebabpersonalizado">Kebab Personalizado</a></li>
                    </ul>
                </li>           
                <li><a href="pedidos.php">Mis Pedidos</a></li>
                <li><a href="?menuLogin=contacto">Contacto</a></li>
                <li><a href="?menuLogin=monedero">Saldo: €<span id="saldo-usuario"><?= $saldoUsuario ?></span></a></li> 
                <li><a href="?menuLogin=carrito">Carrito</a></li>
                <li><a href="logout.php" class="button">Cerrar Sesión</a></li> 
            </ul>
        </nav>
    </header>
</body>
</html>
<script src="../Js/MostrarSaldo.js"></script>
<script src="Js/MostrarSaldo.js"></script>

