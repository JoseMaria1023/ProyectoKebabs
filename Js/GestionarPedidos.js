document.addEventListener("DOMContentLoaded", function () {
    fetch('../APIS/ApiPedido.php')
        .then(respuesta => respuesta.json())
        .then(data => {
            const tablaPedidos = document.getElementById('tabla-Pedidos');

            data.forEach(pedido => {
                const fila = document.createElement('tr');

                const celdaUsuario = document.createElement('td');
                celdaUsuario.textContent = pedido.usuario_id;
                fila.appendChild(celdaUsuario);

                const celdaFecha = document.createElement('td');
                celdaFecha.textContent = pedido.fecha;
                fila.appendChild(celdaFecha);

                const celdaEstado = document.createElement('td');
                celdaEstado.textContent = pedido.estado;
                fila.appendChild(celdaEstado);

                const celdaTotal = document.createElement('td');
                celdaTotal.textContent = pedido.total;
                fila.appendChild(celdaTotal);

                const celdaNombre = document.createElement('td');
                celdaNombre.textContent = pedido.nombre_kebab;
                fila.appendChild(celdaTotal);

                const celdaAcciones = document.createElement('td');

                const botonEditar = document.createElement('button');
                botonEditar.textContent = 'Editar';
                botonEditar.addEventListener('click', () => {
                    editarPedido(pedido);
                });

                const botonEliminar = document.createElement('button');
                botonEliminar.textContent = 'Eliminar';
                botonEliminar.addEventListener('click', () => {
                    eliminarPedido(pedido.id);
                });

                celdaAcciones.appendChild(botonEditar);
                celdaAcciones.appendChild(botonEliminar);
                fila.appendChild(celdaAcciones);

                tablaPedidos.appendChild(fila);
            });
        })
        .catch(() => {
            return fetch('APIS/ApiPedido.php');
        });
});
function editarPedido(pedido) {
    localStorage.setItem('PedidoParaEditar', JSON.stringify(pedido));
    window.location.href = '../vistas_admin/EditarPedidos.php';
}


function eliminarPedido(id) {
    fetch('../APIS/ApiPedido.php?id=' + id, {
        method: 'DELETE',
    })
    .then(function(respuesta) {
        if (respuesta.ok) {
            window.location.reload();
        } 
    });
}
