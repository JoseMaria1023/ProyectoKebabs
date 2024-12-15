document.addEventListener("DOMContentLoaded", function () {
    const usuarioPerfil = JSON.parse(localStorage.getItem('usuarioPerfil'));

    if (usuarioPerfil) {
        // Rellenar los campos con la información del usuario
        document.getElementById('nombre').value = usuarioPerfil.nombre;
        document.getElementById('email').value = usuarioPerfil.email;
        document.getElementById('direccion').value = usuarioPerfil.direccion;
        // Si es necesario, también puedes agregar el ID si lo tienes en la base de datos
        // Mostrar la foto
        const celdaFoto = document.getElementById("celdaFoto");
        const imagen = document.createElement('img');
        imagen.src = usuarioPerfil.foto ? 'data:image/jpeg;base64,' + usuarioPerfil.foto : '../imagenes/64572.png';
        imagen.className = 'user-photo';
        celdaFoto.appendChild(imagen);
    }
});

// Manejar el envío del formulario
document.getElementById('form-editar-usuario').addEventListener('submit', function (event) {
    event.preventDefault();

    // Crear un objeto con los datos actualizados
    const usuarioActualizado = {
        nombre: document.getElementById('nombre').value,
        email: document.getElementById('email').value,
        direccion: document.getElementById('direccion').value,
    };

    // Si hay una foto nueva, hacer un FormData para enviarla junto con los demás datos
    const formData = new FormData();
    formData.append('id', usuarioActualizado.id);
    formData.append('nombre', usuarioActualizado.nombre);
    formData.append('email', usuarioActualizado.email);
    formData.append('direccion', usuarioActualizado.direccion);
    if (usuarioActualizado.foto) {
        formData.append('foto', usuarioActualizado.foto);
    }

    // Enviar la solicitud a la API para actualizar el perfil
    fetch('../APIS/ApiUsuarios.php', {
        method: 'PUT',
        body: formData,
    })
    .then(respuesta => {
        if (respuesta.ok) {
            // Redirigir después de actualizar
            window.location.href = 'http://localhost/proyecto_kebabs/proyectokebabs/vistas_usuarios/PrincipalLogueado.php?menuLogin=miperfil'
        }
    })
    .catch(() => {
        console.error('Error al actualizar el perfil');
    });
});
