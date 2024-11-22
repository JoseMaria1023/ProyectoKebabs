document.addEventListener("DOMContentLoaded", function () {
    fetch('../APIS/ApiKebab.php')
        .then(respuesta => respuesta.json())
        .then(data => {
            const tablaKebab = document.getElementById('tabla-Kebabs');
            tablaKebab.innerHTML = '';

            data.forEach(kebab => {
                const fila = document.createElement('tr');

                const celdaNombre = document.createElement('td');
                celdaNombre.textContent = kebab.nombre;
                fila.appendChild(celdaNombre);

                const celdaDescripcion = document.createElement('td');
                celdaDescripcion.textContent = kebab.descripcion;
                fila.appendChild(celdaDescripcion);

                const celdaPrecio = document.createElement('td');
                celdaPrecio.textContent = kebab.PrecioBase;
                fila.appendChild(celdaPrecio);

                const celdaFoto = document.createElement('td');
                const imagen = document.createElement('img');
                imagen.src = kebab.foto ? 'data:image/jpeg;base64,' + kebab.foto : '../imagenes/64572.png';
                imagen.className = 'user-photo';
                celdaFoto.appendChild(imagen);
                fila.appendChild(celdaFoto);

                const celdaAcciones = document.createElement('td');

                const botonEditar = document.createElement('button');
                botonEditar.textContent = 'Editar';
                botonEditar.addEventListener('click', () => {
                    editarKebab(kebab);
                });

                const botonEliminar = document.createElement('button');
                botonEliminar.textContent = 'Eliminar';
                botonEliminar.addEventListener('click', () => {
                    eliminarKebab(kebab.id);
                });

                celdaAcciones.appendChild(botonEditar);
                celdaAcciones.appendChild(botonEliminar);
                fila.appendChild(celdaAcciones);

                tablaKebab.appendChild(fila);
            });
        });
});

function editarKebab(kebab) {
    localStorage.setItem('kebabParaEditar', JSON.stringify(kebab));
    window.location.href = '../vistas_admin/EditarKebab.php';
}


function eliminarKebab(id) {
    fetch('../APIS/ApiKebab.php?id=' + id, {
        method: 'DELETE',
    })
    .then(function(respuesta) {
        if (respuesta.ok) {
            window.location.reload();
        } 
    });
}
