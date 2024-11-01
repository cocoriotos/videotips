<?php /*Developed by julián González Bucheli*/
        session_unset(); // Elimina todas las variables de sesión 10082024
		session_destroy(); // Destruye la sesión 10082024
		mysqli_close($conn);
		/*echo 	"Session Closed";*/
		/*echo 	"<ha>Sesión Cerrada</ha>";	*/
        header("refresh:2; url=videotrackerauth.php");
?>
