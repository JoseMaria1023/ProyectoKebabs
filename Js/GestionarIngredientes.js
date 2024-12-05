document.addEventListener("DOMContentLoaded", function () {
    fetch('../APIS/ApiIngredientes.php')
        .then(respuesta => respuesta.json())
        .then(data => {
            const tablaIngredientes = document.getElementById('tabla-ingredientes');

            data.forEach(ingredientes => {
                const fila = document.createElement('tr');

                const celdaNombre = document.createElement('td');
                celdaNombre.textContent = ingredientes.nombre;
                fila.appendChild(celdaNombre);

                const celdaPrecio = document.createElement('td');
                celdaPrecio.textContent = ingredientes.precio;
                fila.appendChild(celdaPrecio);

                const celdaFoto = document.createElement('td');
                const imagen = document.createElement('img');
                imagen.src = ingredientes.foto ? 'data:image/jpeg;base64,' + ingredientes.foto : '../imagenes/64572.png';
                imagen.className = 'user-photo';
                celdaFoto.appendChild(imagen);
                fila.appendChild(celdaFoto);

                const celdaAcciones = document.createElement('td');

                const botonEditar = document.createElement('button');
                botonEditar.textContent = 'Editar';
                botonEditar.addEventListener('click', () => {
                    editarIngredientes(ingredientes);
                });

                const botonEliminar = document.createElement('button');
                botonEliminar.textContent = 'Eliminar';
                botonEliminar.addEventListener('click', () => {
                    eliminarIngredientes(ingredientes.id);
                });

                celdaAcciones.appendChild(botonEditar);
                celdaAcciones.appendChild(botonEliminar);
                fila.appendChild(celdaAcciones);

                tablaIngredientes.appendChild(fila);
            });
        })
        .catch(() => {
            return fetch('APIS/ApiIngredientes.php');
        });
});

function editarIngredientes(ingredientes) {
    localStorage.setItem('IngredientesParaEditar', JSON.stringify(ingredientes));
    window.location.href = '../vistas_admin/EditarIngredientes.php';
}


function eliminarIngredientes(id) {
    fetch('../APIS/ApiIngredientes.php?id=' + id, {
        method: 'DELETE',
    })
    .then(function(respuesta) {
        if (respuesta.ok) {
            window.location.reload(); 
        }
    });
}


