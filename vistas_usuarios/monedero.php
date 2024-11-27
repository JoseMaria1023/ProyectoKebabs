<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/monedero.css">
    <link rel="stylesheet" href="css/monedero.css">


</head>
<body>
    
<main class="contenido-principal">
    <section class="seccion-saldo">
        <h2>Saldo Disponible</h2>
        <div class="mostrar-saldo">
            €<span id="saldo-actual"><?= $saldoUsuario ?></span>
        </div>
    </section>
    <section class="seccion-acciones">
        <form id="formulario-añadir-fondos" class="formulario">
            <label for="cantidad">Añadir Fondos:</label>
            <input type="number" id="cantidad" name="cantidad" placeholder="Introduce la cantidad" required step="0.01" min="0">
            <button type="submit" class="boton">Añadir Fondos</button>
        </form>
    </section>
</main>
</body>
</html>
<script src="../Js/Monedero.js"></script>
<script src="Js/Monedero.js"></script>


