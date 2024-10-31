<div class="container">
    <h1>Gestión de Ingredientes</h1>
    <form action="procesarIngrediente.php" method="POST">
        <label for="nombre">Nombre del Ingrediente:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>

        <label for="alergenos">Alérgenos:</label>
        <input type="text" id="alergenos" name="alergenos" placeholder="Ej. Gluten, Lactosa">

        <label for="foto">Foto del Ingrediente:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>

        <button type="submit">Añadir Ingrediente</button>
    </form>
</div>