<html lang="us">
<?php
/*include "nobackpage.php";
include "SessionTimeOut.php";*/
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Acceso - SmartShelf</title>
    <link rel="icon" href="SSCircleBackgroundWhite.ico" type="image/x-icon">
    <script src="head.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style_sheet_auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<!-- SweetAlert2 CSS added 1 31 2025-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS added 1 31 2025-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="bodyadminmodule">
    <div class="login-container">
        <!-- Enlaces de ayuda en la parte superior derecha -->
        <div class="help-links">
            <a href="https://www.youtube.com/playlist?list=PLRQ5KF9igtB2GRlHLSP6Uwx1lzy387Wz5" target="_blank">Video Tutoriales</a>
            <a href="/Manuals/UCLToolManualDelUsuario.pdf" target="_blank">Manual del Usuario</a>
        </div>

        <!-- Encabezado del formulario -->
        <div class="login-header">
            <img src="SSCircleBackgroundBlackElegantwithLink.ico" alt="SmartShelf Logo" class="logo">
            <h1>Solicitud de Acceso</h1>
        </div>

        <!-- Formulario de solicitud de acceso -->
        <form id="login" action="accessemailFinal.php" method="POST" autocomplete="off">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="Name" placeholder="Nombre" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="LastName" placeholder="Apellido" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="text" name="Email" placeholder="Correo electrónico" required>
            </div>
            <div class="input-group">
                <i class="fas fa-globe"></i>
                <input type="text" name="Country" placeholder="País de residencia" required>
            </div>
            <div class="input-group">
                <i class="fas fa-city"></i>
                <input type="text" name="City" placeholder="Ciudad de residencia" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password1" placeholder="Contraseña" required>
            </div>

            <!-- Términos y condiciones -->
            <div class="terms">
                <input type="checkbox" id="terms" onclick="toggleSubmitButton()" required>
                <label for="terms">Acepto los <a href="TermsConditions.php" target="_blank">términos y condiciones</a></label>
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn-login" id="loginbutton" disabled>Enviar</button>
        </form>

        <!-- Botón de cancelar -->
        <form id="login" action="videotrackerauth.php" method="POST">
            <button type="submit" class="btn-cancel">Cancelar</button>
        </form>

        <!-- Información de contacto -->
        <form id="request-access">
            <p>¿Alguna duda? Contáctenos al Email: <a href="mailto:adm@solicionespro.com">adm@solicionespro.com</a></p>
            <p>Fecha: <?php echo date('m/d/Y'); ?></p>
        </form>
    </div>

    <script>
        function toggleSubmitButton() {
            const submitButton = document.getElementById("loginbutton");
            const termsCheckbox = document.getElementById("terms");
            submitButton.disabled = !termsCheckbox.checked;
        }
    </script>
</body>
</html>