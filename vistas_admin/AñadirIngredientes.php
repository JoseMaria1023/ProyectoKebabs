<link rel="stylesheet" href="./css/añadiringredientes.css">
<div class="gestion-ingredientes">
    <div class="container">
        <h1>Gestionar Ingredientes</h1>
        <form>
            <div class="foto">
                <label for="foto">Foto del Ingrediente:</label>
                <input type="file" id="foto" name="foto" required>
            </div>
            <div class="infomarcion-container">
                <div>
                    <label for="name">Nombre del Ingrediente:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="infoadicional">
                    <div>
                        <label for="alergenos">Alergenos:</label>
                        <input type="text" id="alergenos" name="alergenos">
                    </div>
                    <div>
                        <label for="precio">Precio:</label>
                        <input type="number" id="precio" name="precio" required>
                    </div>
                </div>
            </div>
            <button type="submit">Agregar Ingrediente</button>
        </form>
    </div>
</div>
