<html lang="us"> <!-- Page language-->
	<head>
		  
		  <script>
			alert("Detectada que la sesion no tiene actividad por más de 5 minutos, debe iniciar sesión nuevamente");
		  </script>
	</head>


<?php
// Establecer el tiempo de inactividad en segundos (15 minutos)
$timeout_duration = 60;

// Verificar si la sesión está activa
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calcular el tiempo de inactividad
    $elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];

    if ($elapsed_time > $timeout_duration) {
        // Si el tiempo de inactividad excede el límite, cerrar la sesión
		include("closetaskscon.php");
        $_SESSION['timeout_message'] = "Tu sesión ha estado inactiva durante un tiempo. Serás redirigido a la página de inicio de sesión.";
        exit();
        /*header("refresh:0; url=videotrackerauth.php"); // Redirige a la página de autenticación*/
    }
}

// Actualizar el tiempo de la última actividad
$_SESSION['LAST_ACTIVITY'] = time();
?>
</html>