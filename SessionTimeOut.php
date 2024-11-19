<?php
// Establecer el tiempo de inactividad en segundos (15 minutos)
session_start();
$timeout_duration = 60;
$sessiontimeoutreached = $_SESSION['sessiontimeoutreached'];

// Verificar si la sesión está activa
if (isset($_SESSION['LAST_ACTIVITY'])) {
$elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];
echo "Tiempo transcurrido: " . $elapsed_time . " segundos.<br>";

if ($elapsed_time > $timeout_duration) {
    // Si el tiempo de inactividad excede el límite, cerrar la sesión
    
    $_SESSION['sessiontimeoutreached'] = 1;
    // Verificamos si la URL de la página anterior está disponible
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");  // Redirige a la página anterior
        sleep(5);    
        include("closetaskscon.php");
    } else {
        // Si no hay URL de la página anterior, redirigimos a una página por defecto
        header("Location: videotrackerauth.php");
    }
    exit();
}
}else{
    // Si no hay tiempo de actividad, podemos establecerlo al iniciar la sesión
    $_SESSION['LAST_ACTIVITY'] = time();
}

// Actualizar el tiempo de la última actividad
$_SESSION['LAST_ACTIVITY'] = time();
?>
</html>