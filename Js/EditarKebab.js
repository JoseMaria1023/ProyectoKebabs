document.addEventListener("DOMContentLoaded", function () {
    const kebabParaEditar = JSON.parse(localStorage.getItem('kebabParaEditar'));

    if (kebabParaEditar) {
        document.getElementById('nombre').value = kebabParaEditar.nombre;
        document.getElementById('descripcion').value = kebabParaEditar.descripcion;
        document.getElementById('precio_base').value = kebabParaEditar.precio_base;
        document.getElementById('id-kebab').value = kebabParaEditar.id;
    }
});

document.getElementById('form-editar-kebab').addEventListener('submit', function (event) {
    event.preventDefault();  
    const kebab = {
        id: document.getElementById('id-kebab').value,
        nombre: document.getElementById('nombre').value,
        descripcion: document.getElementById('descripcion').value,
        precio_base: parseFloat(document.getElementById('precio_base').value),  
    };

    fetch('../APIS/ApiKebab.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(kebab),  
    })
    .then(respuesta => {
        if (respuesta.ok) {
            window.location.href = '../vistas_admin/GestionarKebabs.php'; 
        } 
    })
    .catch(() => {
        return fetch('APIS/ApiKebab.php');
    });
});

