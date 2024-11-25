document.addEventListener("DOMContentLoaded", function () {
    const pedidoParaEditar = JSON.parse(localStorage.getItem('PedidoParaEditar'));

    if (pedidoParaEditar) {
        document.getElementById('Estado').value = pedidoParaEditar.estado;

    }
});

document.getElementById('form-editar-Pedido').addEventListener('submit', function (event) {
    event.preventDefault(); 

    const pedido = {
        estado: document.getElementById('Estado').value
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
    });
});
