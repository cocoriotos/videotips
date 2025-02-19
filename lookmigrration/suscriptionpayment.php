<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
include "nobackpage.php";
include "db_connection1.php";
include "headersuscription.php";
$local_username = $_SESSION['email'];
$suscriptiondue = $_SESSION['suscriptiondue'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones</title>
    <link rel="icon" href="SSCircleBackgroundWhite.ico" type="image/x-icon">
    <link rel="stylesheet" href="style_sheet_TC.css">
    <link rel="stylesheet" href="terms_styles.css">
    <script src="Popper/popper.min.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Términos y Condiciones de Uso</h1>
        </header>
        <section class="content">
            <h2>Beneficios de la Aplicación</h2>
            <ul>
                <li>Organiza tus enlaces importantes en una biblioteca personal.</li>
                <li>Accede fácilmente a contenido guardado con un motor de búsqueda eficiente.</li>
                <li>Comparte enlaces de forma rápida y sencilla.</li>
            </ul>
            <h2>Condiciones de Uso</h2>
            <ul>
                <li>No almacenes información sensible o personal.</li>
                <li>Nos adherimos a la normativa de protección de datos (Habeas Data).</li>
                <li>No permitimos contenido que incite a la violencia o conductas ilícitas.</li>
            </ul>
            <h2>Planes de Suscripción</h2>
            <ul>
                <li>3 meses: <strong>$20.000 COP</strong></li>
                <li>6 meses: <strong>$40.000 COP</strong></li>
                <li>1 año: <strong>$60.000 COP</strong></li>
            </ul>
            <h2>Pago y Renovación</h2>
            <p>Realiza tu pago a través de Nequi (+57 305 4293185) o PayPal (YSXRZMT2AAG4G).</p>
            <p>Envía el comprobante de pago en formato PDF al correo <a href="mailto:adm@solicionespro.com">adm@solicionespro.com</a>.</p>
        </section>
    </div>
    <?php
    if ($suscriptiondue == 1) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Suscripción vencida',
                text: 'Tu período de prueba ha finalizado. Renueva tu suscripción para continuar disfrutando de los beneficios.',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            });
        });
        </script>";
        $_SESSION['suscriptiondue'] = 0;
    }
    ?>
</body>
</html>
