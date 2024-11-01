<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu Kebab</title>
    <link rel="stylesheet" href="./css/ElegirKebab.css">
</head>
<body>
    <header class="main-header">
        <h1>Selecciona tu Kebab</h1>
    </header>

    <main class="kebab-container">
        <section class="kebab-options">
            <h2>Opciones de Kebab</h2>
            <button id="kebab-casa" class="kebab-button">Kebab de la Casa</button>
            <button id="kebab-gusto" class="kebab-button">Kebab al Gusto</button>
        </section>

        <section class="ingredients-selection">
            <h2>Selecciona tus Ingredientes</h2>
            <div class="ingredients-list">
                <div class="ingredient" draggable="true" data-ingredient="carne">Carne</div>
                <div class="ingredient" draggable="true" data-ingredient="lechuga">Lechuga</div>
                <div class="ingredient" draggable="true" data-ingredient="tomate">Tomate</div>
                <div class="ingredient" draggable="true" data-ingredient="cebolla">Cebolla</div>
                <div class="ingredient" draggable="true" data-ingredient="salsa">Salsa</div>
                <div class="ingredient" draggable="true" data-ingredient="queso">Queso</div>
            </div>
        </section>

        <section class="selected-ingredients">
            <h2>Ingredientes Seleccionados</h2>
            <div class="drop-area" id="drop-area">
                Arrastra los ingredientes aquí
            </div>
        </section>
    </main>

    <script src="./js/kebab-selection.js"></script>
</body>
</html>
