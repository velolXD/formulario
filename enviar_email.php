<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_remitente = $_POST['nombre_remitente'];
    $email_remitente = $_POST['email_remitente'];
    $asunto = $_POST['asunto'];
    $destinatario = $_POST['destinatario'];
    $mensaje = $_POST['mensaje'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email_remitente, $nombre_remitente);
        $mail->addAddress($destinatario);
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        $mail->send();
        echo '✅ Correo enviado correctamente.';
    } catch (Exception $e) {
        echo '❌ Error al enviar el correo: ' . $mail->ErrorInfo;
    }
} else {
    echo "⛔ Acceso no autorizado.";
}



