function obtenerIngredientes() {
    fetch('../APIS/ApiIngredientes.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.json();
        })
        .then(ingredientes => {
            const selectIngredientes = document.getElementById('ingredientes');
            ingredientes.forEach(ingrediente => {
                const opcion = document.createElement('option');
                opcion.value = ingrediente.id; 
                opcion.textContent = ingrediente.nombre;
                selectIngredientes.appendChild(opcion);
            });
        })
        .catch(() => {
            alert("Error al cargar los ingredientes");
        });
}

obtenerIngredientes();
