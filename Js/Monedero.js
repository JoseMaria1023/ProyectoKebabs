function obtenerSaldo() {
    fetch('../APIS/ApiSaldo.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.saldo) {
            const saldo = parseFloat(data.saldo);
            if (!isNaN(saldo)) {
                document.getElementById('saldo-actual').textContent = saldo.toFixed(2);
                document.getElementById('saldo-usuario').textContent = saldo.toFixed(2);
            } 
        }
    });
}

document.addEventListener("DOMContentLoaded", obtenerSaldo);

document.getElementById("formulario-añadir-fondos").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const cantidad = parseFloat(document.getElementById("cantidad").value);
    fetch('../APIS/ApiSaldo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ cantidad: cantidad })
    })
    .then(response => response.json())
    .then(data => {
        if (data.nuevoSaldo) {
            const nuevoSaldo = parseFloat(data.nuevoSaldo);
            if (!isNaN(nuevoSaldo)) {
                document.getElementById("saldo-actual").textContent = nuevoSaldo.toFixed(2);
                document.getElementById("saldo-usuario").textContent = nuevoSaldo.toFixed(2);
            } 
        }
    });
});