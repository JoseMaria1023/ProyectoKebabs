<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Tienda Online de Kebabs</title>
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <img src="../imagenes/KebabLogo.png" alt="Logo de la Tienda de Kebabs">
        </div>
        <nav>
            <ul>
                <li>
                <a href="GestionarUsuarios.php">Gestión de Usuarios</a>
                </li>
                
                <li>
                    <a href="GestionarKebabs.php">Gestionar Kebabs</a>
                    <ul>
                        <li><a href="CrearKebab.php">Insertar Kebabs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="GestionarIngredientes.php">Gestionar Ingredientes</a>
                    <ul>
                    <li><a href="AñadirIngredientes.php">Insertar Ingredientes</a></li>
                    </ul>
                
                </li>

                <li><a href="logout.php" class="button">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>