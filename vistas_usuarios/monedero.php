<link rel="stylesheet" href="./css/monedero.css">
<main class="contenido-principal">
        <section class="seccion-saldo">
            <h2>Saldo Disponible</h2>
            <div class="mostrar-saldo">
                €<span id="saldo-actual">100.00</span>
            </div>
        </section>
        <section class="seccion-acciones">
            <form id="formulario-añadir-fondos" class="formulario">
                <label for="cantidad">Añadir Fondos:</label>
                <input type="number" id="cantidad" name="cantidad" placeholder="Introduce la cantidad" required min="1">
                <button type="submit" class="boton">Añadir Fondos</button>
            </form>
        </section>
    </main>