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
            
            // Guardar los datos del usuario en localStorage
            localStorage.setItem('usuarioPerfil', JSON.stringify(usuario));

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

            // Agregar el eventListener al botón de editar
            const botonEditar = document.getElementById("editarPerfil");
            botonEditar.addEventListener('click', function() {
                // Guardar los datos en localStorage para la edición
                localStorage.setItem('usuarioParaEditar', JSON.stringify(usuario));

                // Recargar la página y redirigir a la página de edición
                window.location.href = '../vistas_usuarios/EditarPerfil.php'; // Redirigir a la página de edición
            });

            // Agregar el eventListener al botón de cerrar sesión
            const botonCerrarSesion = document.getElementById("cerrarSesion");
            botonCerrarSesion.addEventListener('click', function() {
                // Opcional: Limpiar los datos del localStorage al cerrar sesión
                localStorage.removeItem('usuarioPerfil');

                // Redirigir a la página de cierre de sesión (o a la página principal, según tu lógica)
                window.location.href = '../Metodos/CerrarSesion.php'; // Redirigir a la página de login
            });
        } 
    })
    .catch(error => {
        console.error('Error fetching perfil data:', error);
    });
});
