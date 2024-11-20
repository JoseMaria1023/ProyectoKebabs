<?php 
include_once '../cargadores/autocargadores.php'; 
cargarCSS('header', 'monedero', 'footer');
?>
<?php include '../vistas_generales/Header.php'; ?>
<main>
    
<div class="container">
        <h1>Selecciona tu Kebab</h1>
        
        <div class="option">
            <a href="kebab-casa.html" class="link">
                <img src="imagenes/kebab-casa.jpg" alt="Kebab de la casa" class="image">
                <p>Kebab de la casa</p>
            </a>
        </div>

        <div class="option">
            <a href="kebab-gusto.html" class="link">
                <img src="imagenes/kebab-al-gusto.jpg" alt="Kebab al gusto" class="image">
                <p>Kebab al gusto</p>
            </a>
        </div>
    </div>

</main>