<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Tienda Online de Kebabs</title>
    <link rel="stylesheet" href="../css/HeaderAdmin.css">
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <img src="../imagenes/KebabLogo.png" alt="Logo de la Tienda de Kebabs">
        </div>
        <nav>
            <ul>
                <li>
                <a href="?menuAdmin=Usuarios">Gestión de Usuarios</a>
                </li>

                <ul>
                <li>
                <a href="?menuAdmin=Pedidos">Gestión Pedidos</a>
                </li>
                
                
                <li>
                    <a href="?menuAdmin=Kebabs">Gestionar Kebabs</a>
                    <ul>
                        <li><a href="?menuAdmin=crearkebab">Insertar Kebabs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="?menuAdmin=Ingredientes">Gestionar Ingredientes</a>
                    <ul>
                    <li><a href="?menuAdmin=añadiringredientes">Insertar Ingredientes</a></li>
                    </ul>
                
                </li>

                <li><a href="logout.php" class="button">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>