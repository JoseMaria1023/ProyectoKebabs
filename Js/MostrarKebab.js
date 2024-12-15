function obtenerKebabs() {
    fetch('APIS/ApiKebab.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.json(); 
        })
        .then(kebabs => {
            if (kebabs.length > 0) {
                const contenedorKebabs = document.getElementById('kebab-container');
                kebabs.forEach(kebab => {
                    const ContieneKebabs = document.createElement('div');
                    ContieneKebabs.className = 'ContieneKebabs';

                    const h3 = document.createElement('h3');
                    h3.textContent = kebab.nombre;
                    ContieneKebabs.appendChild(h3);

                    const ingredientes = document.createElement('p');
                    ingredientes.innerHTML = kebab.ingredientes ? kebab.ingredientes : 'Sin ingredientes';
                    ContieneKebabs.appendChild(ingredientes);

                    const Descripcion = document.createElement('p');
                    Descripcion.innerHTML = kebab.descripcion;
                    ContieneKebabs.appendChild(Descripcion);

                    const precio = document.createElement('p');
                    precio.innerHTML = `${kebab.precio_base}€`;
                    ContieneKebabs.appendChild(precio);

                    const imagenSrc = kebab.foto
                        ? 'data:image/jpeg;base64,' + kebab.foto
                        : '../imagenes/64572.png';
                    const img = document.createElement('img');
                    img.src = imagenSrc;
                    img.alt = kebab.nombre;
                    img.className = 'kebab-image';
                    ContieneKebabs.appendChild(img);

                    const botonPedir = document.createElement('button');
                    botonPedir.textContent = 'Añadir al Carrito';
                    botonPedir.className = 'boton-pedir';
                    botonPedir.addEventListener('click', () => {
                        AñadirAlCarrito(kebab);
                    });
                    ContieneKebabs.appendChild(botonPedir);
                    contenedorKebabs.appendChild(ContieneKebabs);
                });
            }
        })
        fetch('../APIS/ApiKebab.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.json(); 
        })
        .then(kebabs => {
            if (kebabs.length > 0) {
                const contenedorKebabs = document.getElementById('kebab-container');
                kebabs.forEach(kebab => {
                    const ContieneKebabs = document.createElement('div');
                    ContieneKebabs.className = 'ContieneKebabs';

                    const h3 = document.createElement('h3');
                    h3.textContent = kebab.nombre;
                    ContieneKebabs.appendChild(h3);

                    const ingredientes = document.createElement('p');
                    ingredientes.innerHTML = kebab.ingredientes ? kebab.ingredientes : 'Sin ingredientes';
                    ContieneKebabs.appendChild(ingredientes);

                    const Descripcion = document.createElement('p');
                    Descripcion.innerHTML = kebab.descripcion;
                    ContieneKebabs.appendChild(Descripcion);

                    const precio = document.createElement('p');
                    precio.innerHTML = `${kebab.precio_base}€`;
                    ContieneKebabs.appendChild(precio);

                    const imagenSrc = kebab.foto
                        ? 'data:image/jpeg;base64,' + kebab.foto
                        : '../imagenes/64572.png';
                    const img = document.createElement('img');
                    img.src = imagenSrc;
                    img.alt = kebab.nombre;
                    img.className = 'kebab-image';
                    ContieneKebabs.appendChild(img);

                    const botonPedir = document.createElement('button');
                    botonPedir.textContent = 'Añadir al Carrito';
                    botonPedir.className = 'boton-pedir';
                    botonPedir.addEventListener('click', () => {
                        AñadirAlCarrito(kebab);
                    });
                    ContieneKebabs.appendChild(botonPedir);

                    contenedorKebabs.appendChild(ContieneKebabs);
                });
            }
        })
};

function AñadirAlCarrito(kebab) {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito.push({
        id: kebab.id,
        nombre: kebab.nombre,
        precio: kebab.precio_base
    });
    localStorage.setItem('carrito', JSON.stringify(carrito));
    alert(`Se ha añadido el pedido al carrito.`);
}

obtenerKebabs();

document.getElementById('descargar-pdf').addEventListener('click', function() {
    window.location.href = '../Metodos/DescargarPDF.php';
});

