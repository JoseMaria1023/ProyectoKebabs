document.addEventListener("DOMContentLoaded", function() {
    fetch('../APIS/ApiPedidosUsuarios.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Verifica la estructura de los datos

        if (data.success) {
            if (data.usuario) {  
                const usuario = data.usuario;
                document.getElementById("nombreUsuario").innerText = usuario.nombre;

                const fotoUsuario = document.getElementById("fotoUsuario");
                fotoUsuario.src = usuario.foto ? 'data:image/jpeg;base64,' + usuario.foto : '../imagenes/64572.png';

                const listaPedidos = document.getElementById("listaPedidos");
                data.pedidos.forEach(function(pedido) {
                    const pedidoDiv = document.createElement('div');
                    pedidoDiv.classList.add('pedido');
                    
                    const fecha = document.createElement('p');
                    fecha.textContent = 'Fecha: ' + pedido.fecha;
                    pedidoDiv.appendChild(fecha);

                    const estado = document.createElement('p');
                    estado.textContent = 'Estado: ' + pedido.estado;
                    pedidoDiv.appendChild(estado);

                    const total = document.createElement('p');
                    total.textContent = 'Total: ' + pedido.total + '€';
                    pedidoDiv.appendChild(total);

                    const nombreKebab = document.createElement('p');
                    nombreKebab.textContent = 'Nombre del kebab: ' + pedido.nombreKebab; // Asegúrate de que este campo existe
                    pedidoDiv.appendChild(nombreKebab);

                    listaPedidos.appendChild(pedidoDiv);
                });
            } 
        } 
    })
});