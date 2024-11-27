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
                document.getElementById('saldo-usuario').textContent = datos.saldo;
            } 
        })
    }

    document.addEventListener("DOMContentLoaded", obtenerSaldo);

