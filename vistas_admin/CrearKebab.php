
<link rel="stylesheet" href="./css/CrearKebab.css">
<main class="contenedor-administracion">
    <h2>Crear Kebab de la Casa</h2>

    <section class="seleccion-ingredientes">
        <h3>Selecciona los Ingredientes</h3>
        <div class="ingredientes-disponibles" id="ingredientes-disponibles">
        </div>
        <div>
            <label for="ingredientes">Ingredientes:</label>
            <select id="ingredientes" name="ingredientesArray" multiple required>
            </select>
        </div>
    </section>

    <section class="ingredientes-seleccionados">
        <h3>Ingredientes del Kebab de la Casa</h3>
        <div id="zona-arrastre">
            Arrastra los ingredientes aquí
        </div>
    </section>

    <section class="definir-precio">
        <label for="precio-kebab">Precio del Kebab de la Casa (€):</label>
        <input type="number" id="precio-kebab" name="precio-kebab" min="0" step="0.01">
    </section>

    <section class="guardar-kebab">
        <button id="boton-guardar-kebab">Guardar Kebab de la Casa</button>
    </section>
</main>
<script src="../Js/MostrarIngredientes.js"></script>
