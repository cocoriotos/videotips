<?php 
        session_unset(); 
		session_destroy(); 
		mysqli_close($conn);
        header("Location: videotrackerauth.php");
		exit();
?>