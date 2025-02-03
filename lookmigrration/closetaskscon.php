<?php 
        session_unset(); 
		session_destroy(); 
		mysqli_close($conn);
        header("refresh:0; url=videotrackerauth.php");
		/*exit();*/
?>
