<?php
// Establecer el tiempo de inactividad en segundos (15 minutos)
$timeout_duration = 60;

// Verificar si la sesión está activa
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calcular el tiempo de inactividad
    $elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];

    if ($elapsed_time > $timeout_duration) {
        // Si el tiempo de inactividad excede el límite, cerrar la sesión
        echo "No se ha detectado actividad desde hace 5 minutos por parte del usuario, será redirigido a la páginan de inicio.";
		session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: videotrackerauth.php"); // Redirige a la página de autenticación
        exit();
    }
}

// Actualizar el tiempo de la última actividad
$_SESSION['LAST_ACTIVITY'] = time();
?>
