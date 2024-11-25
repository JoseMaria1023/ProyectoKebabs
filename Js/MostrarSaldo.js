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
                document.getElementById('saldo-usuario').textContent = data.saldo;
            } 
        })
    }

    document.addEventListener("DOMContentLoaded", obtenerSaldo);

