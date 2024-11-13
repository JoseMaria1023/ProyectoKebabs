function obtenerAlergenos() {
    fetch('../APIS/ApiAlergenos.php')
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return respuesta.text(); 
        })
        .then(texto => {
            return JSON.parse(texto); 
        })
        .then(alergenos => {
            const selectAlergenos = document.getElementById('alergenos');
            alergenos.forEach(alergeno => {
                const opcion = document.createElement('option');
                opcion.value = alergeno.id;
                opcion.textContent = alergeno.nombre;
                selectAlergenos.appendChild(opcion);
            });
        })
}
obtenerAlergenos();