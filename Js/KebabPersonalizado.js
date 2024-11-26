function obtenerIngredientes() {
    fetch('../APIS/ApiIngredientes.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.text(); 
        })
        .then(texto => {
            return JSON.parse(texto); 
        })
        .then(ingredientes => {
            const selectIngredientes = document.getElementById('ingredientes');
            ingredientes.forEach(ingredientes => {
                const opcion = document.createElement('option');
                opcion.value = ingredientes.id;
                opcion.textContent = ingredientes.nombre;
                selectIngredientes.appendChild(opcion);
            });
        })
}
obtenerIngredientes();

