<?php
// Establecer el tiempo de inactividad en segundos (15 minutos)
session_start();
$timeout_duration = 60;
$sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];

// Verificar si la sesión está activa
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calcular el tiempo de inactividad
    $elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];

    if ($elapsed_time > $timeout_duration) {
        // Si el tiempo de inactividad excede el límite, cerrar la sesión
        $_SESSION['sessiontimeoutreached'] = 1;
        header("refresh:0; url=videolinkadminmodule.php"); // Redirige a la página de autenticación
    }
}

// Actualizar el tiempo de la última actividad
$_SESSION['LAST_ACTIVITY'] = time();
?>