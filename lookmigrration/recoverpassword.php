<!--  Developed by julián González Bucheli -->
<html lang="us">
	<?php /*include "nobackpage.php"; 
	include "SessionTimeOut.php";*/	
	date_default_timezone_set('America/Bogota');
	?>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar Contraseña - SmartShelf</title>
        <link rel="icon" href="SSCircleBackgroundWhite.ico" type="image/x-icon">
        <script src="head.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="style_sheet_auth.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
		<!-- SweetAlert2 CSS added 1 31 2025-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

		<!-- SweetAlert2 JS added 1 31 2025-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById("login").addEventListener("submit", function(event) {
                var emailInput = document.querySelector("input[name='email']");
                var email = emailInput.value;

                // Expresión regular para validar el formato de un correo electrónico
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailPattern.test(email)) {
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Mensaje',
                        text: 'Por favor, ingresa una dirección de correo electrónico válida.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        content: 'custom-swal-content',
                        confirmButton: 'custom-swal-confirm-button'
                        },
                        timer: 5000, // 5000 milisegundos = 5 segundos
                        timerProgressBar: true, // Muestra una barra de progreso
                        didOpen: () => {
                        Swal.showLoading(); // Muestra un indicador de carga
                        },
                        willClose: () => {
                        }
                    });
                    });
                    </script>";
                    event.preventDefault(); // Evita que el formulario se envíe
                }
            });
    </script>
    </head>	
	<body id="bodyadminmodule">
        <div class="login-container">
            <!-- Enlaces de ayuda en la parte superior derecha -->
            <div class="help-links">
                <a href="https://www.youtube.com/playlist?list=PLRQ5KF9igtB2GRlHLSP6Uwx1lzy387Wz5" target="_blank">Video Tutoriales</a>
                <a href="UCLToolManualDelUsuario.pdf" target="_blank">Manual del Usuario</a>
            </div>

            <!-- Encabezado del formulario -->
            <div class="login-header">
                <img src="SSCircleBackgroundBlackElegantwithLink.ico" alt="SmartShelf Logo" class="logo">
                <h1>Recuperación de Contraseña</h1>
            </div>

            <!-- Formulario de recuperación de contraseña -->
            <form id="login" action="recoverpasswordemailFinal.php" method="POST" autocomplete="off">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <button type="submit" class="btn-login">Recuperar Contraseña</button>
                <br>
                <a href="videotrackerauth.php" class="forgot-password">Cancelar</a>
            </form>

            <!-- Información de contacto -->
            <form id="request-access">
                <p>¿Alguna duda? Contáctenos al Email: <a href="mailto:adm@solicionespro.com">adm@solicionespro.com</a></p>
                <br>
                <p>Fecha: <?php echo date('m/d/Y'); ?></p>
            </form>
        </div>
    </body>
</html>