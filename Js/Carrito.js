document.addEventListener("DOMContentLoaded", function () {
    mostrarCarrito();
    document.getElementById('realizar-pedido').addEventListener('click', realizarPedido);
});

function mostrarCarrito() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const contenedorCarrito = document.getElementById('carrito-container');
    const totalPrecio = document.getElementById('total-price');
    let total = 0;

    contenedorCarrito.innerHTML = '';

    carrito.forEach((item, index) => {
        const div = document.createElement('div');
        div.className = 'producto-carrito';

        const nombre = document.createElement('h3');
        nombre.textContent = item.nombre;
        div.appendChild(nombre);

        const precio = document.createElement('p');
        precio.textContent = `${item.precio}€`;
        div.appendChild(precio);

        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.className = 'boton-eliminar';

        botonEliminar.addEventListener('click', () => eliminarProducto(index));
        div.appendChild(botonEliminar);

        total += parseFloat(item.precio);

        contenedorCarrito.appendChild(div);
    });

    totalPrecio.textContent = total.toFixed(2); 
}

function eliminarProducto(index) {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    carrito.splice(index, 1);

    localStorage.setItem('carrito', JSON.stringify(carrito));

    mostrarCarrito();
}

function realizarPedido() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const totalPrecio = document.getElementById('total-price').textContent;

    fetch('../APIS/ApiSesion.php', {
        method: 'GET',
    })
    .then(response => {
        if (!response.ok) {
        }
        return response.json();
    })
    .then(data => {
        if (data.success && data.usuarioId) {
            const usuarioId = data.usuarioId;

            return fetch('../APIS/ApiPedido.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    usuarioId: usuarioId,
                    total: parseFloat(totalPrecio)
                })
            });
        } 
    })
    .then(response => {
        if (response.ok) {
            alert('Pedido realizado con éxito'); 
        } 
    })
    
}

