<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['username'];

/*$query = "update videotips_videotips SET active = 'No' and username = '$local_username' where id='$id'";*/
$query = "delete from videotips_videotips where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    /*die("Link not found");*/
    die("Enlace no encontrado");
  }
/*echo 	"Register deleted";*/
include("LinkDeletedMessage.php");
header("refresh:0; url=videolinkadminmodule.php");  
?>