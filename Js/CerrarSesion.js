document.getElementById('cerrar-sesion').addEventListener('click', function (e) {
    e.preventDefault();
    fetch('../APIS/ApiSesion', {
        method: 'POST',  // Cambiamos a POST
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', // Definimos el tipo de contenido
        },
        body: new URLSearchParams({
            'accion': 'cerrarSesion'  // Indicamos que se trata de una acción de cerrar sesión
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '../index.php'; // Redirige si la sesión se cerró correctamente
        }
    })
    .catch(error => console.error('Error:', error));
});
