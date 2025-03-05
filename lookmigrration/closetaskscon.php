<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Limpiar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}

// Cerrar la conexión a la base de datos si está abierta
if (isset($conn)) {
    mysqli_close($conn);
}

// Redirigir al usuario a la página de autenticación
header("Location: videotrackerauth.php");
exit();
?>
