function obtenerKebabs() {
    fetch('APIS/ApiKebab.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.text(); 
        })
        .then(texto => {
            return JSON.parse(texto); 
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
                    ingredientes.innerHTML = `${kebab.ingredientes}`;
                    ContieneKebabs.appendChild(ingredientes);

                    const Descripcion = document.createElement('p');
                    Descripcion.innerHTML = `${kebab.descripcion}`;
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

                    const botonPersonalizar = document.createElement('button');
                    botonPersonalizar.textContent = 'Personalizar';
                    botonPersonalizar.className = 'boton-personalizar';
                    ContieneKebabs.appendChild(botonPersonalizar);

                    contenedorKebabs.appendChild(ContieneKebabs);
                });
            } 
        })
            
            fetch('../APIS/ApiKebab.php')
                .then(respuesta => {
                    return respuesta.text();
                })
                .then(texto => JSON.parse(texto))
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
                    ingredientes.innerHTML = `${kebab.ingredientes}`;
                    ContieneKebabs.appendChild(ingredientes);

                    const Descripcion = document.createElement('p');
                    Descripcion.innerHTML = `${kebab.descripcion}`;
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

                    const botonPersonalizar = document.createElement('button');
                    botonPersonalizar.textContent = 'Personalizar';
                    botonPersonalizar.className = 'boton-personalizar';
                    ContieneKebabs.appendChild(botonPersonalizar);

                    contenedorKebabs.appendChild(ContieneKebabs);
                        });
                    } 
                })

}


function AñadirAlCarrito(kebab) {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito.push({
        id: kebab.id,
        nombre: kebab.nombre,
        precio: kebab.precio_base
    });
    localStorage.setItem('carrito', JSON.stringify(carrito));
    alert(`Se ha añadido ${kebab.nombre} al carrito.`);
}

obtenerKebabs();