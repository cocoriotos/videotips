<?php 
include "db_connection1.php";
/**include "sessions.php";10082024*/
$id=$_POST['id'];
$local_username=$_SESSION['username'];

$query = "update videotips_videotips SET active = 'No' and uername = '$local_username' where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    die("Link not found");
  }
header("refresh:2; url=videolinkadminmodule.php");  
?>