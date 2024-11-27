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

function cargarCSS() {
    $css = [
        'inicio' => '/css/inicio.css',
        'login' => '/css/login.css',
        'registro' => '/css/registro.css',
        'menu' => '/css/menu.css',
        'contacto' => '/css/contacto.css',
    ];

    if (isset($_GET['header']) && array_key_exists($_GET['header'], $css)) {
        echo '<link rel="stylesheet" href="' . $css[$_GET['header']] . '">';
    }
}
?>