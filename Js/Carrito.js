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
        precio.textContent = `${item.precio}€`;
        productoDiv.appendChild(precio);

        // Contenedor de cantidad y botones
        const cantidadContainer = document.createElement('div');
        cantidadContainer.className = 'cantidad-container';

        const cantidadDisplay = document.createElement('span');
        cantidadDisplay.className = 'cantidad-display';
        cantidadDisplay.textContent = `Cantidad: ${item.cantidad}`;
        cantidadContainer.appendChild(cantidadDisplay);

        const cantidadBtns = document.createElement('div');
        cantidadBtns.className = 'cantidad-btns';

        const btnRestar = document.createElement('button');
        btnRestar.textContent = '-';
        btnRestar.className = 'btn-cantidad';
        btnRestar.onclick = () => actualizarCantidad(index, -1);
        cantidadBtns.appendChild(btnRestar);

        const btnSumar = document.createElement('button');
        btnSumar.textContent = '+';
        btnSumar.className = 'btn-cantidad';
        btnSumar.onclick = () => actualizarCantidad(index, 1);
        cantidadBtns.appendChild(btnSumar);

        cantidadContainer.appendChild(cantidadBtns);
        productoDiv.appendChild(cantidadContainer);

        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.className = 'boton-eliminar';
        botonEliminar.onclick = () => eliminarProducto(index);
        productoDiv.appendChild(botonEliminar);

        contenedorCarrito.appendChild(productoDiv);

        // Calcular total
        total += parseFloat(item.precio) * item.cantidad;
    });

    // Modificar esta parte para incluir "Total:"
    totalPrecio.innerHTML = `Total: ${total.toFixed(2)}€`; // Esto mostrará "Total: 10.00€"

}

function actualizarCantidad(index, cambio) {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    if (carrito[index].cantidad + cambio > 0) {
        carrito[index].cantidad += cambio;
    } else {
        carrito[index].cantidad = 1; // Mantener al menos 1
    }

    localStorage.setItem('carrito', JSON.stringify(carrito));
    mostrarCarrito();
}

function eliminarProducto(index) {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    carrito.splice(index, 1);

    localStorage.setItem('carrito', JSON.stringify(carrito));

    mostrarCarrito();
}

function realizarPedido() {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const totalPrecio = document.getElementById('Precio-Total')?.textContent;

    fetch('../APIS/ApiSesion.php', {
        method: 'GET',
    })
    .then(response => response.json())
    .then(datos => {
        if (datos.success && datos.usuarioId) {
            const usuarioId = datos.usuarioId;
            let nombreKebab = '';
            for (let i = 0; i < carrito.length; i++) {
                if (i > 0) nombreKebab += ', ';
                nombreKebab += carrito[i].nombre;
            }
            return fetch('../APIS/ApiPedido.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    usuarioId: usuarioId,
                    totalPrecio: parseFloat(totalPrecio),  // Cambié "total" a "totalPrecio" para que coincida con PHP
                    nombreKebab: nombreKebab
                })
            });
        }
    })
    .then(response => {
        if (response.ok) {
            // Ocultar el carrito completo y mostrar el formulario de dirección
            ocultarCarrito();
            mostrarFormularioDireccion();
        } else {
            alert('Hubo un error al realizar el pedido.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
}

function ocultarCarrito() {
    // Ocultar el contenedor del carrito
    document.getElementById('carrito-container').style.display = 'none';

    // Ocultar el contenedor del total y el botón de realizar pedido si es necesario
    document.getElementById('total-container').style.display = 'none';
}

function mostrarFormularioDireccion() {
    // Crear contenedor para el formulario de dirección
    const formContainer = document.createElement('div');
    formContainer.id = 'direccion-container';
    
    // Crear título
    const titulo = document.createElement('h2');
    titulo.textContent = 'Introduce tu dirección y código postal';
    
    // Crear formulario
    const form = document.createElement('form');
    
    // Crear etiqueta y campo para dirección
    const labelDireccion = document.createElement('label');
    labelDireccion.textContent = 'Dirección:';
    const inputDireccion = document.createElement('input');
    inputDireccion.type = 'text';
    inputDireccion.id = 'direccion';
    inputDireccion.placeholder = 'Escribe tu dirección';
    
    // Crear etiqueta y campo para código postal
    const labelCodigoPostal = document.createElement('label');
    labelCodigoPostal.textContent = 'Código Postal:';
    const inputCodigoPostal = document.createElement('input');
    inputCodigoPostal.type = 'text';
    inputCodigoPostal.id = 'codigo-postal';
    inputCodigoPostal.placeholder = 'Escribe tu código postal';
    
    // Crear botón de confirmar dirección
    const btnConfirmar = document.createElement('button');
    btnConfirmar.type = 'button';
    btnConfirmar.textContent = 'Confirmar Dirección';
    btnConfirmar.onclick = confirmarDireccion;
    
    // Añadir todos los elementos al formulario
    form.appendChild(labelDireccion);
    form.appendChild(inputDireccion);
    form.appendChild(labelCodigoPostal);
    form.appendChild(inputCodigoPostal);
    form.appendChild(btnConfirmar);
    
    // Añadir el formulario al contenedor
    formContainer.appendChild(titulo);
    formContainer.appendChild(form);
    
    // Añadir el contenedor al cuerpo del documento
    document.body.appendChild(formContainer);
}

function confirmarDireccion() {
    const direccion = document.getElementById('direccion').value;
    const codigoPostal = document.getElementById('codigo-postal').value;

    if (direccion && codigoPostal) {
        // Mostrar el alert con la dirección y el código postal
        alert('Pedido realizado con éxito. Dirección: ' + direccion + ', Código Postal: ' + codigoPostal);

        // Recargar la página después de confirmar la dirección (vaciará el carrito)
        localStorage.removeItem('carrito');  // Vaciar el carrito en el localStorage
        location.reload();  // Recargar la página
    } else {
        alert('Por favor ingresa una dirección y un código postal válidos.');
    }
}
