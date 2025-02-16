<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí puedes agregar la lógica para enviar el correo o guardar en una base de datos
    // Ejemplo de envío de correo:
    $to = "tucorreo@example.com";
    $subject = "Nuevo Mensaje de SmartShelf";
    $body = "Nombre: $name\nCorreo: $email\nMensaje: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>¡Gracias por contactarnos, $name! Te responderemos pronto.</p>";
    } else {
        echo "<p>Hubo un error al enviar tu mensaje. Inténtalo de nuevo.</p>";
    }
}
?>