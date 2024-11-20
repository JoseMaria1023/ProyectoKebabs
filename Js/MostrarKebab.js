function obtenerKebabs() {
    fetch('../APIS/ApiKebab.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.text();
        })
        .then(texto => {
            console.log('Respuesta de la API: ', texto);
            
            const kebabs = JSON.parse(texto);

            if (kebabs.length > 0) {
                const contenedorKebabs = document.getElementById('kebab-container');
                
                kebabs.forEach(kebab => {
                    const kebabCard = document.createElement('div');
                    kebabCard.className = 'kebab-card';

                    const h3 = document.createElement('h3');
                    h3.textContent = kebab.nombre;
                    kebabCard.appendChild(h3);

                    const ingredientes = document.createElement('p');
                    ingredientes.innerHTML = `<strong>Ingredientes:</strong> ${kebab.descripcion}`;
                    kebabCard.appendChild(ingredientes);

                    const precio = document.createElement('p');
                    precio.innerHTML = `<strong>Precio:</strong> ${kebab.precio_base}€`;
                    kebabCard.appendChild(precio);

                    const imagenSrc = kebab.foto ? 'data:image/jpeg;base64,' + kebab.foto : '../imagenes/64572.png';
                    const img = document.createElement('img');
                    img.src = imagenSrc;
                    img.alt = kebab.nombre;
                    img.className = 'kebab-image';
                    kebabCard.appendChild(img);

                    contenedorKebabs.appendChild(kebabCard);
                });
            }
        });
}

obtenerKebabs();
