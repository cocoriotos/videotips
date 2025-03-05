<?php 
        /*session_unset(); 
		session_destroy(); 
		mysqli_close($conn);
        header("Location: videotrackerauth.php");
		exit();*/
		// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar el estado de la sesión
switch (session_status()) {
    case PHP_SESSION_DISABLED:
        echo "Las sesiones están deshabilitadas en el servidor.";
        break;
    case PHP_SESSION_NONE:
        echo "No hay una sesión activa.";
        break;
    case PHP_SESSION_ACTIVE:
        echo "Hay una sesión activa.";
        // Puedes imprimir las variables de sesión si lo deseas
        if (!empty($_SESSION)) {
            /*echo "<pre>Variables de sesión: ";
            print_r($_SESSION);
            echo "</pre>";*/
			session_destroy(); 
			mysqli_close($conn);
			include "videotrackerauth.php";
			/*exit()*/;
        } else {
            echo "No hay variables de sesión definidas.";
        }
        /*break;*/
}
?>