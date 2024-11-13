function obtenerUsuarios() {
    fetch('../APIS/ApiUsuarios.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.text(); 
        })
        .then(texto => {
            return JSON.parse(texto); 
        })
        .then(usuarios => {
            const selectUsuarios = document.getElementById('usuarios');
            usuarios.forEach(usuarios => {
                const opcion = document.createElement('option');
                opcion.value = usuarios.id;
                opcion.textContent = usuarios.nombre;
                selectUsuarios.appendChild(opcion);
            });
        })
}
obtenerUsuarios();                                                                                                                                                          