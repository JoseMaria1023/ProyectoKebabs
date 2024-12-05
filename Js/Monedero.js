function obtenerSaldo() {
    fetch('../APIS/ApiSaldo.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(datos => {
        if (datos.saldo) {
            const saldo = parseFloat(datos.saldo);
            if (!isNaN(saldo)) {
                document.getElementById('saldo-actual').textContent = saldo.toFixed(2);
                document.getElementById('saldo-usuario').textContent = saldo.toFixed(2);
            }   
        }   
    });
}


document.addEventListener("DOMContentLoaded", obtenerSaldo);

document.getElementById("formulario-añadir-dinero").addEventListener("submit", function(event) {
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
    .then(datos => {
        if (datos.nuevoSaldo) {
            const nuevoSaldo = parseFloat(datos.nuevoSaldo);
            if (!isNaN(nuevoSaldo)) {
                document.getElementById("saldo-actual").textContent = nuevoSaldo.toFixed(2);
                document.getElementById("saldo-usuario").textContent = nuevoSaldo.toFixed(2);
            } 
            
        }
        
    });
    
});

