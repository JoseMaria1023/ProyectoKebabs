<?php

include_once '../cargadores/autocargadores.php';  

class ApiCorreo {

    public function RespuestaContacto() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'POST':
                $this->enviarCorreo();
                break;
        }
    }

    private function enviarCorreo() {
        if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $mensaje = $_POST['mensaje'];
            $asunto =  $_POST['asunto'];
            
            $cuerpo = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";

            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            $destino = "angulorivasjosemaria@gmail.com";  

            if (mail($destino, $asunto, $cuerpo, $headers)) {
                $this->enviarrespuesta(200, ['mensaje' => 'Correo enviado correctamente']);
            } 
        } 
    }

    private function enviarrespuesta($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiCorreo = new ApiCorreo();
$apiCorreo->RespuestaContacto();

?>

