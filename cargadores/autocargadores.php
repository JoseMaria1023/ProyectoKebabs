<?php
spl_autoload_register(function ($class_name) {
    $carpetas = [
        __DIR__ . '/../entidades/',
        __DIR__ . '/../repositorios/',
        __DIR__ . '/../Metodos/',
        __DIR__ . '/../vistas_admin/',
        __DIR__ . '/../vistas_generales/',
        __DIR__ . '/../vistas_usuarios/',
    ];

    foreach ($carpetas as $carpeta) {
        $archivo_clase = $carpeta . $class_name . '.php';
        
        if (file_exists($archivo_clase)) {
            require_once $archivo_clase;
            return; 
        }
    }
});

function cargarCSS(...$nombres_css) {
    foreach ($nombres_css as $nombre_css) {
        $ruta_css = __DIR__ . '/../css/' . $nombre_css . '.css';
        if (file_exists($ruta_css)) {
            echo '<link rel="stylesheet" href="../css/' . $nombre_css . '.css">';
        } 
    }
}
?>