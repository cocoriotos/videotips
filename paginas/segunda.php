<?php
// Iniciar la sesión
session_start();

// Configurar cabeceras para evitar el caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Establecer una variable de sesión para indicar que el usuario está en la segunda página
$_SESSION['pagina_actual'] = 'segunda';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Segunda Página</title>
</head>
<body>
    <h1>Segunda Página</h1>
    <p>Esta es la segunda página.</p>
    <a href="tercera.php">Ir a la Tercera Página</a>
    <br>
    <a href="index.php">Volver a la Página de Inicio</a>
</body>
</html>