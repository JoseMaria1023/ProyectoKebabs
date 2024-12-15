document.addEventListener("DOMContentLoaded", function () {
    // Obtener todos los enlaces del menú
    const enlaces = document.querySelectorAll("nav ul li a");

    // Obtener la URL actual
    const urlActual = window.location.href;

    enlaces.forEach(enlace => {
        // Comprobar si la URL del enlace está contenida en la URL actual
        if (urlActual.includes(enlace.getAttribute("href"))) {
            // Agregar clase active al enlace que coincida
            enlace.classList.add("active");
        }

        // Añadir evento de click para cambiar la clase active al hacer clic
        enlace.addEventListener("click", function() {
            // Eliminar la clase active de todos los enlaces
            enlaces.forEach(enlace => enlace.classList.remove("active"));
            // Añadir la clase active al enlace clicado
            enlace.classList.add("active");
        });
    });

   
    ;
});
