<main class="contenedor-administracion">
        <h2>Crear Kebab de la Casa</h2>

        <section class="seleccion-ingredientes">
            <h3>Selecciona los Ingredientes</h3>
            <div class="ingredientes-disponibles">
                <div class="ingrediente" draggable="true">Carne</div>
                <div class="ingrediente" draggable="true">Lechuga</div>
                <div class="ingrediente" draggable="true">Tomate</div>
                <div class="ingrediente" draggable="true">Cebolla</div>
                <div class="ingrediente" draggable="true">Salsa</div>
                <div class="ingrediente" draggable="true">Queso</div>
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
            <input type="number" id="precio-kebab" name="precio-kebab" min="0">
        </section>

        <section class="guardar-kebab">
            <button id="boton-guardar-kebab">Guardar Kebab de la Casa</button>
        </section>
    </main>