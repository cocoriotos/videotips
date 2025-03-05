<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario intenta navegar hacia atrás
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Cerrar la sesión
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión

    // Redirigir a la página de autenticación
    header("Location: videotrackerauth.php");
    exit();
}

// Configurar cabeceras para evitar el caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Protegida</title>
    <script>
        // Evitar que el usuario navegue hacia atrás
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1); // Forzar al navegador a avanzar en lugar de retroceder
        };
    </script>
</head>
<body>
    <h1>Bienvenido a la página protegida</h1>
    <p>Esta es una página segura. Si intentas navegar hacia atrás, serás redirigido a la página de autenticación.</p>
</body>
</html>