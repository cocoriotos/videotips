<?php
// Establecer el tiempo de inactividad en segundos (15 minutos)
session_start();
$timeout_duration = 60;
$sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];

// Verificar si la sesión está activa

if ($elapsed_time > $timeout_duration) {
    // Si el tiempo de inactividad excede el límite, cerrar la sesión
        $_SESSION['sessiontimeoutreached'] = 1;
    // Verificamos si la URL de la página anterior está disponible
       
        include("closetaskscon.php");
        header("Location: videotrackerauth.php");
        exit();
}

// Actualizar el tiempo de la última actividad
$_SESSION['LAST_ACTIVITY'] = time();
?>
</html>