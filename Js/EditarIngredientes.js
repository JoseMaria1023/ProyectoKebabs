document.addEventListener("DOMContentLoaded", function () {
    const IngredientesParaEditar = JSON.parse(localStorage.getItem('IngredientesParaEditar'));

    if (IngredientesParaEditar) {
        document.getElementById('id-ingredientes').value = IngredientesParaEditar.id;
        document.getElementById('nombre').value = IngredientesParaEditar.nombre;
        document.getElementById('Precio').value = IngredientesParaEditar.precio;
    }
});

document.getElementById('form-editar-ingredientes').addEventListener('submit', function (event) {
    event.preventDefault();

    const ingredientes = {
        id: document.getElementById('id-ingredientes').value,
        nombre: document.getElementById('nombre').value,
        Precio: parseFloat(document.getElementById('Precio').value),
    };

    fetch('../APIS/ApiIngredientes.php', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(ingredientes),
    })
        .then((respuesta) => respuesta.json())
        .then((data) => {
            window.location.href = 'http://localhost/proyecto_kebabs/proyectokebabs/vistas_admin/PrincipalAdmin.php?menuAdmin=Ingredientes';
        });
});