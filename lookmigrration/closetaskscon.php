<?php 
	include "sessions.php";
    session_start();
	session_unset();
	session_destroy();
	$conn->close();

	//header("videotrackerauth.php");
	//exit();
?>