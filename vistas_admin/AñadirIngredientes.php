<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('headerLogueado', 'añadiringredientes', 'footer');
?>
<?php include '../vistas_usuarios/HeaderLogueado.php'; ?>
<script src="../Js/PreviewImagen.js"></script>
<div class="gestion-ingredientes">
    <div class="container">
        <h1>Gestionar Ingredientes</h1>
        <form action="../APIS/ApiIngredientes.php" method="POST" enctype="multipart/form-data">
        <div class="foto">
            <label for="foto">Seleccionar Imagen</label>
            <input type="file" name="foto" id="foto" />
            <div id="preview-container" class="image-preview">
                <img id="preview" src="">
            </div>
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
                    <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                </div>
                <div>
                    <label for="alergenos">Alergenos:</label>
                    <select id="alergenos" name="alergenosArray[]" multiple required>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit">Añadir Ingrediente</button>
        </form>
    </div>
</div>
<script src="../Js/MostrarAlergenos.js"></script>

<?php include '../vistas_generales/footer.php'; ?>

