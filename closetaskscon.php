<?php /*Developed by julián González Bucheli*/
        session_unset(); // Elimina todas las variables de sesión
		session_destroy(); // Destruye la sesión 
		mysqli_close($conn);
		/*echo 	"Session Closed";*/
		/*echo 	"<ha>Sesión Cerrada</ha>";	*/
        header("refresh:0; url=videotrackerauth.php");
?>
