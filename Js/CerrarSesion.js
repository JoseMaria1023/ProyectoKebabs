document.getElementById('cerrar-sesion').addEventListener('click', function (e) {
    e.preventDefault();
    fetch('../APIS/ApiSesion', {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', 
        },
        body: new URLSearchParams({
            'accion': 'cerrarSesion'  
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '../index.php'; 
        }
    })
    .catch(error => console.error('Error:', error));
});
