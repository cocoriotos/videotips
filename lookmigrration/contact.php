<?php
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí puedes agregar la lógica para enviar el correo o guardar en una base de datos
    // Ejemplo de envío de correo:
    $to = "adm@solicionespro.com";
    $subject = "Nuevo Mensaje de SmartShelf";
    $body = "Nombre: $name\nCorreo: $email\nMensaje: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // Alerta de éxito y redirección
        echo "<script>
                Swal.fire({
                    title: 'Mensaje',
                    text: 'Gracias por contactarnos, estamos revisando tu mensaje y te responderemos pronto.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        content: 'custom-swal-content',
                        confirmButton: 'custom-swal-confirm-button'
                    }
                }).then(() => {
                    window.location.href = 'index.php';
                });
              </script>";
    } else {
        // Alerta de error y redirección
        echo "<script>
                Swal.fire({
                    title: 'Mensaje',
                    text: 'Hubo un error al enviar tu mensaje. Inténtalo de nuevo.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        content: 'custom-swal-content',
                        confirmButton: 'custom-swal-confirm-button'
                    }
                }).then(() => {
                    window.location.href = 'index.php';
                });
              </script>";
    }
}
?>
