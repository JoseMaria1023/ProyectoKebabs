document.getElementById('loginForm').onsubmit = function(event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    fetch('../APIS/ApiSesion.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'email=' + email + '&password=' + password
    })
    .then(function(response) {
        return response.text(); 
    })
    .then(function(text) {
        console.log("Respuesta del servidor:", text);  
        var data = JSON.parse(text); 
        if (data.success) {
            if (data.rol === 'administrador') {
                window.location.href = '../vistas_admin/AñadirIngredientes.php';
            } else {
                window.location.href = '../vistas_usuarios/monedero.php';
            }
        }
    });
};