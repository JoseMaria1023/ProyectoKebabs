window.addEventListener("load", function(){
    document.addEventListener("DOMContentLoaded", function() {
        fetch('../controladores/ProcesarIngredientes.php')
            .then(response => response.json())
            .then(ingredientes => {
                const ingredientesTableBody = document.querySelector('#ingredientes-disponibles tbody');
                ingredientes.forEach(ingrediente => {
                    const row = document.createElement('tr');

                    const nombreCell = document.createElement('td');
                    nombreCell.textContent = ingrediente.nombre;
                    row.appendChild(nombreCell);

                    const precioCell = document.createElement('td');
                    precioCell.textContent = ingrediente.precio;
                    row.appendChild(precioCell);

                    const alergenoCell = document.createElement('td');
                    alergenoCell.textContent = ingrediente.alergeno;
                    row.appendChild(alergenoCell);

                    const fotoCell = document.createElement('td');
                    const imgElement = document.createElement('img');
                    imgElement.src = `data:image/png;base64,${ingrediente.foto}`;
                    imgElement.alt = `Imagen de ${ingrediente.nombre}`;
                    imgElement.style.width = "50px"; 
                    fotoCell.appendChild(imgElement);
                    row.appendChild(fotoCell);

                    ingredientesTableBody.appendChild(row);
                });
            })
    });
});