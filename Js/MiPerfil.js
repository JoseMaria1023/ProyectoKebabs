document.addEventListener("DOMContentLoaded", function() {
    fetch('../APIS/ApiPerfil.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const usuario = data.usuario;
            
            const nombreUsuario = document.createElement('h1');
            nombreUsuario.textContent = usuario.nombre;
            document.getElementById("nombreUsuario").appendChild(nombreUsuario);

            const celdaFoto = document.getElementById("celdaFoto");
            const imagen = document.createElement('img');
            imagen.src = usuario.foto ? 'data:image/jpeg;base64,' + usuario.foto : '../imagenes/64572.png';
            imagen.className = 'user-photo';
            celdaFoto.appendChild(imagen);  

            const detallesUsuario = document.getElementById("detallesUsuario");
            
            const email = document.createElement('p');
            email.textContent = 'Email: ' + usuario.email;
            detallesUsuario.appendChild(email);
            
            const direccion = document.createElement('p');
            direccion.textContent = 'Dirección: ' + usuario.direccion;
            detallesUsuario.appendChild(direccion);
            
            const saldo = document.createElement('p');
            saldo.textContent = 'Saldo: ' + usuario.saldo + '€';
            detallesUsuario.appendChild(saldo);
            
            const rol = document.createElement('p');
            rol.textContent = 'Rol: ' + usuario.rol;
            detallesUsuario.appendChild(rol);
        } 
    })
});