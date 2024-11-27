document.addEventListener("DOMContentLoaded", function () {
    fetch('../APIS/ApiUsuarios.php')
        .then(respuesta => respuesta.json())
        .then(data => {
            const tablaUsuarios = document.getElementById('tabla-usuarios');

            data.forEach(usuario => {
                const fila = document.createElement('tr');

                const celdaNombre = document.createElement('td');
                celdaNombre.textContent = usuario.nombre;
                fila.appendChild(celdaNombre);

                const celdaEmail = document.createElement('td');
                celdaEmail.textContent = usuario.email;
                fila.appendChild(celdaEmail);

                const celdaDireccion = document.createElement('td');
                celdaDireccion.textContent = usuario.direccion;
                fila.appendChild(celdaDireccion);

                const celdaRol = document.createElement('td');
                celdaRol.textContent = usuario.rol;
                fila.appendChild(celdaRol);

                const celdaFoto = document.createElement('td');
                const imagen = document.createElement('img');
                imagen.src = usuario.foto ? 'data:image/jpeg;base64,' + usuario.foto : '../imagenes/64572.png';
                imagen.className = 'user-photo';
                celdaFoto.appendChild(imagen);
                fila.appendChild(celdaFoto);

                const celdaAcciones = document.createElement('td');

                const botonEditar = document.createElement('button');
                botonEditar.textContent = 'Editar';
                botonEditar.addEventListener('click', () => {
                    editarUsuario(usuario);
                });

                const botonEliminar = document.createElement('button');
                botonEliminar.textContent = 'Eliminar';
                botonEliminar.addEventListener('click', () => {
                    eliminarUsuario(usuario.id);
                });

                celdaAcciones.appendChild(botonEditar);
                celdaAcciones.appendChild(botonEliminar);
                fila.appendChild(celdaAcciones);

                tablaUsuarios.appendChild(fila);
                
            });
        })
        .catch(() => {
            return fetch('APIS/ApiUsuarios.php');
        });
});

function editarUsuario(usuario) {
    localStorage.setItem('usuarioParaEditar', JSON.stringify(usuario));
    window.location.href = '../vistas_admin/EditarUsuario.php';
}

function eliminarUsuario(id) {
    fetch('../APIS/ApiUsuarios.php?id=' + id, {
        method: 'DELETE',
    })
    .then(function(respuesta) {
        if (respuesta.ok) {
            window.location.reload();
        } 
    })
    .catch(() => {
        return fetch('APIS/ApiUsuarios.php');
    });
}
