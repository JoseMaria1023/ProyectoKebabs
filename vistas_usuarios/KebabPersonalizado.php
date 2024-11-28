<head>
<link rel="stylesheet" href="css/KebabPersonalizado.css">
<link rel="stylesheet" href="../css/KebabPersonalizado.css">
<script src="Js/PreviewImagen.js"></script>
</head>
<body>
<div class="gestion-ingredientes">
    <div class="container">
        <h1>Crear Kebab Personalizado</h1>
        <form id="form-kebab" method="POST" enctype="multipart/form-data">
        <div class="foto">
            <label for="foto">Seleccionar Imagen</label>
            <input type="file" name="foto" id="foto" />
            <div id="preview-container" class="image-preview">
                <img id="preview" src="">
            </div>
        </div>

        <div class="infomarcion-container">
            <div>
                <label for="nombre">Nombre del kebab:</label>
                <input type="text" name="nombre" required>
            </div>
            <div>
            <div class="infomarcion-container">
                <label for="descripcion">descripcion:</label>
                <input type="text" name="descripcion" required>
            </div>
            <div class="infoadicional">
                <div>
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                </div>
                <div>
                    <label for="ingredientes">Ingredientes:</label>
                    <select id="ingredientes" name="ingredientesArray" multiple required>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit">Añadir Kebab Personalizado</button>
        </form>
    </div>
</div>
</body>
<script src="Js/KebabPersonalizado.js"></script>
<script src="../Js/KebabPersonalizado.js"></script>

