document.addEventListener("DOMContentLoaded", () => {
    mostrarCarrito();
    document.getElementById('realizar-pedido').onclick = realizarPedido;
});

function mostrarCarrito() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const contenedorCarrito = document.getElementById('carrito-container');
    const totalPrecio = document.getElementById('Precio-Total'); 
    let total = 0;

    contenedorCarrito.innerHTML = ''; 

    carrito.forEach((item, index) => {
        const productoDiv = document.createElement('div');
        productoDiv.className = 'producto-carrito';

        const nombre = document.createElement('h3');
        nombre.textContent = item.nombre;
        productoDiv.appendChild(nombre);

        const precio = document.createElement('p');
        precio.textContent = item.precio + '€';
        productoDiv.appendChild(precio);

        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.className = 'boton-eliminar';
        botonEliminar.onclick = () => eliminarProducto(index);
        productoDiv.appendChild(botonEliminar);

        contenedorCarrito.appendChild(productoDiv);

        total += parseFloat(item.precio);
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
    const totalPrecio = document.getElementById('Precio-Total')?.textContent 

    fetch('../APIS/ApiSesion.php', {
        method: 'GET',
    })
    .then(response => {
        return response.json();
    })
    .then(datos => {
        if (datos.success && datos.usuarioId) {
            const usuarioId = datos.usuarioId;

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
