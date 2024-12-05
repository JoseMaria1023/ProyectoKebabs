<?php
spl_autoload_register(function ($class_name) {
    $carpetas = [
        __DIR__ . '/../entidades/',
        __DIR__ . '/../repositorios/',
        __DIR__ . '/../Metodos/',
        __DIR__ . '/../controladores/',
        __DIR__ . '/../vistas_admin/',
        __DIR__ . '/../vistas_generales/',
        __DIR__ . '/../vistas_usuarios/',
        __DIR__ . '/../css/'

    ];

    foreach ($carpetas as $carpeta) {
        $archivo_clase = $carpeta . $class_name . '.php';
        
        if (file_exists($archivo_clase)) {
            require_once $archivo_clase;
            return; 
        }
    }
});


?>