document.getElementById('loginForm').onsubmit = function(event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    fetch('../APIS/ApiSesion.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password)
    })
    .then(function(respuesta) {
        return respuesta.json(); 
    })
    .then(function(datos) {
        if (datos.success) {
            window.location.href = (datos.rol === 'administrador') ? '../vistas_admin/AñadirIngredientes.php' : '../vistas_usuarios/monedero.php';
        } 
    })
};
