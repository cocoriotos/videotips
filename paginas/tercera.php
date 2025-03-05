<?php
// Iniciar la sesión
session_start();

// Configurar cabeceras para evitar el caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Establecer una variable de sesión para indicar que el usuario está en la tercera página
$_SESSION['pagina_actual'] = 'tercera';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tercera Página</title>
</head>
<body>
    <h1>Tercera Página</h1>
    <p>Esta es la tercera página.</p>
    <a href="segunda.php">Volver a la Segunda Página</a>
    <br>
    <a href="index.php">Volver a la Página de Inicio</a>
</body>
</html>