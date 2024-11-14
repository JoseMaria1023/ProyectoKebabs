document.addEventListener("DOMContentLoaded", function() {
    fetch('../APIS/ApiUsuarios.php')
        .then(function(respuesta) { return respuesta.json(); })
        .then(function(data) {
            var tablaUsuarios = document.getElementById('tabla-usuarios');
            tablaUsuarios.innerHTML = '';

            data.forEach(function(usuario) {
                var fila = document.createElement('tr');

                var celdaNombre = document.createElement('td');
                celdaNombre.textContent = usuario.nombre;
                fila.appendChild(celdaNombre);

                var celdaEmail = document.createElement('td');
                celdaEmail.textContent = usuario.email;
                fila.appendChild(celdaEmail);

                var celdaDireccion = document.createElement('td');
                celdaDireccion.textContent = usuario.direccion;
                fila.appendChild(celdaDireccion);

                var celdaRol = document.createElement('td');
                celdaRol.textContent = usuario.rol;
                fila.appendChild(celdaRol);

                var celdaFoto = document.createElement('td');
                var imagen = document.createElement('img');
                imagen.src = usuario.foto ? 'data:image/jpeg;base64,' + usuario.foto : '../imagenes/64572.png';
                imagen.className = 'user-photo';
                celdaFoto.appendChild(imagen);
                fila.appendChild(celdaFoto);

                var celdaAcciones = document.createElement('td');
                var botonEditar = document.createElement('button');
                botonEditar.textContent = 'Editar';
                celdaAcciones.appendChild(botonEditar);

                var botonEliminar = document.createElement('button');
                botonEliminar.textContent = 'Eliminar';
                celdaAcciones.appendChild(botonEliminar);

                fila.appendChild(celdaAcciones);

                tablaUsuarios.appendChild(fila);
            });
        });
});
function editarUsuario() {

}

function eliminarUsuario() {

}