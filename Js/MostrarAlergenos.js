function obtenerAlergenos() {
    fetch('../APIS/ApiAlergenos.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta de la API');
            }
            return response.text(); 
        })
        .then(text => {
            console.log(text); 
            return JSON.parse(text); 
        })
        .then(alergenos => {
            const selectAlergenos = document.getElementById('alergenos');
            alergenos.forEach(alergeno => {
                const option = document.createElement('option');
                option.value = alergeno.id;
                option.textContent = alergeno.nombre;
                selectAlergenos.appendChild(option);
            });
        })
}
obtenerAlergenos();