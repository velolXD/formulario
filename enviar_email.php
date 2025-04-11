<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre_remitente = $_POST['nombre_remitente'];
    $email_remitente = $_POST['email_remitente'];
    $asunto = $_POST['asunto'];
    $destinatario = $_POST['destinatario'];
    $mensaje = $_POST['mensaje'];

    // Encabezados del correo
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . $nombre_remitente . " <" . $email_remitente . ">\r\n";
    $headers .= "Reply-To: " . $nombre_remitente . " <" . $email_remitente . ">\r\n";

    // Envío del correo
    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "El correo ha sido enviado correctamente.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
} else {
    // Si se accede directamente a este archivo sin enviar datos desde el formulario
    echo "Acceso no autorizado.";
}


