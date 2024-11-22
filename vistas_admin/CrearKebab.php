<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('headerAdmin', 'CrearKebab', 'footer');
?>
<?php include '../vistas_admin/HeaderAdmin.php'; ?>
<main class="contenedor-administracion">
    <h2>Crear Kebab de la Casa</h2>

    <form id="form-crear-kebab" action="../APIS/ApiKebab.php" method="POST" enctype="multipart/form-data">
        <div class="formulario-contenedor">
            <div class="columna izquierda">
                <section class="foto-kebab">
                    <h3>Selecciona la Foto</h3>
                    <input type="file" id="foto" name="foto" accept="image/*">
                </section>

                <section class="definir-precio">
                    <label for="precio">Precio del Kebab de la Casa (€):</label>
                    <input type="number" id="precio-kebab" name="precio" min="0" step="0.01" required>
                </section>

                <section>
                <label for="nombre">Nombre del Kebab:</label>
                <input type="text" name="nombre" require>

                </section>
                <section class="descripcion-kebab">
                    <label for="descripcion">Descripción del Kebab:</label>
                    <textarea id="descripcion-kebab" name="descripcion" ></textarea>
                </section>
            </div>

            <div class="columna medio">
                <section class="seleccion-ingredientes">
                    <h3>Selecciona los Ingredientes</h3>
                    <select id="ingredientes" name="ingredientesArray" multiple required>
                    </select>
                </section>
            </div>

            <div class="columna derecha">
                <section class="filtros">
                    <h3>Filtros</h3>
                    <div class="filtro">
                        <label for="filtro-precio">Precio máximo (€):</label>
                        <input type="number" id="filtro-precio" name="filtro-precio" min="0" step="0.01">
                    </div>
                </section>
            </div>
        </div>

        <section class="guardar-kebab">
            <button type="submit" id="boton-guardar-kebab">Guardar Kebab de la Casa</button>
        </section>
    </form>
</main>

<?php include '../vistas_generales/footer.php'; ?>
<script src="../Js/MostrarIngredientes.js"></script>
