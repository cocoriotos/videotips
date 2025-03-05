<?php 
        /* 
		session_destroy(); 
		mysqli_close($conn);
        header("Location: videotrackerauth.php");
		exit();*/
		// Iniciar la sesión si no está iniciada

    session_start();
	session_unset();
	include "nobackpage.php";
	include "videotrackerauth.php";
?>