<?php 
        /* 
		session_destroy(); 
		mysqli_close($conn);
        header("Location: videotrackerauth.php");
		exit();*/
		// Iniciar la sesión si no está iniciada
	session_cache_limiter('nocache');
    session_start();
	session_unset();
	session_destroy();
	$conn->close();
	header("videotrackerauth.php");
	exit();
?>