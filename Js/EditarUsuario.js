document.addEventListener("DOMContentLoaded", function () {
    const usuarioParaEditar = JSON.parse(localStorage.getItem('usuarioParaEditar'));

    if (usuarioParaEditar) {
        document.getElementById('nombre').value = usuarioParaEditar.nombre;
        document.getElementById('email').value = usuarioParaEditar.email;
        document.getElementById('direccion').value = usuarioParaEditar.direccion;
        document.getElementById('rol').value = usuarioParaEditar.rol;
        document.getElementById('id-usuario').value = usuarioParaEditar.id;
    }
});

document.getElementById('form-editar-usuario').addEventListener('submit', function (event) {
    event.preventDefault(); 

    const usuario = {
        id: document.getElementById('id-usuario').value,
        nombre: document.getElementById('nombre').value,
        email: document.getElementById('email').value,
        direccion: document.getElementById('direccion').value,
        rol: document.getElementById('rol').value
    };

    fetch('../APIS/ApiUsuarios.php', {
        method: 'PUT', 
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(usuario),
    })
    .then(respuesta => {
        if (respuesta.ok) {
            window.location.href = 'http://localhost/proyecto_kebabs/proyectokebabs/vistas_admin/PrincipalAdmin.php?menuAdmin=Usuarios'; 
        } 
    })
    .catch(() => {
        return fetch('APIS/ApiUsuarios.php');
    });
});
