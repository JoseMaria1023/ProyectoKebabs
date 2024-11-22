function obtenerKebabs() {
    fetch('../APIS/ApiKebab.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.text();
        })
        .then(texto => {
            const kebabs = JSON.parse(texto);

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

                    const imagenSrc = kebab.foto ? 'data:image/jpeg;base64,' + kebab.foto : '../imagenes/64572.png';
                    const img = document.createElement('img');
                    img.src = imagenSrc;
                    img.alt = kebab.nombre;
                    img.className = 'kebab-image';
                    ContieneKebabs.appendChild(img);

                    const botonPedir = document.createElement('button');
                    botonPedir.textContent = 'Pedir';
                    botonPedir.className = 'boton-pedir';
                    ContieneKebabs.appendChild(botonPedir);

                    const botonPersonalizar = document.createElement('button');
                    botonPersonalizar.textContent = 'Personalizar';
                    botonPersonalizar.className = 'boton-personalizar';
                    ContieneKebabs.appendChild(botonPersonalizar);

                    contenedorKebabs.appendChild(ContieneKebabs);
                });
            }
        })
        .catch(error => console.error('Error:', error));
}

obtenerKebabs();
