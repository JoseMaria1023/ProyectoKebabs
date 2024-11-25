<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('headerLogueado', 'monedero', 'footer');
?>
<?php include '../vistas_usuarios/HeaderLogueado.php'; ?>
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
<script src="../Js/Monedero.js"></script>
<?php include '../vistas_generales/footer.php'; ?>
