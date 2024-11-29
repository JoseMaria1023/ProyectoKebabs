document.addEventListener("DOMContentLoaded", function () {
    const PedidoParaEditar = JSON.parse(localStorage.getItem('PedidoParaEditar'));

    if (PedidoParaEditar) {
        document.getElementById('id-pedido').value = PedidoParaEditar.id;
        document.getElementById('estado').value = PedidoParaEditar.estado;
    }
});

document.getElementById('form-editar-Pedido').addEventListener('submit', function (event) {
    event.preventDefault();  
    const pedido = {
        estado: document.getElementById('estado').value,
        id: document.getElementById('id-pedido').value,

    };

    fetch('../APIS/ApiPedido.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(pedido),  
    })
    .then(respuesta => {
        if (respuesta.ok) {
            window.location.href = '../vistas_admin/GestionarPedidos.php'; 
        } 
    })
    .catch(() => {
        return fetch('APIS/ApiPedido.php');
    });
});

