<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer autoload

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_remitente = $_POST['nombre_remitente'];
    $email_remitente = $_POST['email_remitente'];
    $asunto = $_POST['asunto'];
    $destinatario = $_POST['destinatario'];
    $mensaje = $_POST['mensaje'];

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Servidor SMTP (ej: smtp.gmail.com)
        $mail->SMTPAuth   = true;
        $mail->Username   = 'TU_CORREO@gmail.com';  // ⚠️ Pon aquí tu correo
        $mail->Password   = 'TU_CONTRASEÑA_O_APP_PASSWORD'; // ⚠️ Mejor usar contraseña de app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Configurar remitente y destinatario
        $mail->setFrom($email_remitente, $nombre_remitente);
        $mail->addAddress($destinatario);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;

        $mail->send();
        echo 'Correo enviado correctamente.';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso no autorizado.";
}
?>



