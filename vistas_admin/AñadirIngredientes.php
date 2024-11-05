<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('headerLogueado', 'añadiringredientes', 'footer');
?>
<?php include '../vistas_usuarios/HeaderLogueado.php'; ?>
<div class="gestion-ingredientes">
    <div class="container">
        <h1>Gestionar Ingredientes</h1>
        <form action="../controladores/ProcesarIngredientes.php" method="POST">
            <div class="foto">
                <label for="foto">Foto del Ingrediente:</label>
                <input type="file" id="foto" name="foto">
            </div>
            <div class="infomarcion-container">
                <div>
                    <label for="nombre">Nombre del Ingrediente:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="infoadicional">
                    <div>
                        <label for="precio">Precio:</label>
                        <input type="number" id="precio" name="precio" required>
                    </div>
                    <div>
                        <label for="alergenos">Alergenos:</label>
                        <input type="text" id="alergenos" name="alergenos">
                    </div>
                </div>
            </div>
            <button type="submit">Agregar Ingrediente</button>
        </form>
    </div>
</div>
<?php include '../vistas_generales/footer.php'; ?>



