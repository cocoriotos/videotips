
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>No Navegar</title>
    <script>
        // Evitar que el usuario navegue hacia atrás o adelante
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1); // Forzar al navegador a avanzar en lugar de retroceder
        };
    </script>
</head>
<body>
    <h1>No se permite navegar hacia atrás o adelante</h1>
    <p>Has sido redirigido a la página de inicio.</p>
</body>
</html>

<?php 
// Iniciar la sesión
session_start();

// Cerrar la sesión
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión

// Configurar cabeceras para evitar el caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirigir a la página de inicio
header("Location: index.php");
exit();
?>