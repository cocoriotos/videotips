<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['username'];

$query = "update videotips_videotips SET active = 'No' and uername = '$local_username' where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    /*die("Link not found");*/
    die("Enlace no encontrado");
  }
/*echo 	"Register deleted";*/
echo 	"<ha>Registro Borrado</ha>";
header("refresh:3; url=videolinkadminmodule.php");  
?>