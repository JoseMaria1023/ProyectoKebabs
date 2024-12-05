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
        id: document.getElementById('id-pedido').value,
        estado: document.getElementById('estado').value
    };

    fetch('../APIS/ApiPedido.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(pedido),
    })
    .then(respuesta => respuesta.text())
    .then(data => {
        if (data) {
            const parsedData = JSON.parse(data);
            window.location.href = 'http://localhost/proyecto_kebabs/proyectokebabs/vistas_admin/PrincipalAdmin.php?menuAdmin=Pedidos';        } 
    });
});
