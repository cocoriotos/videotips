<?php 
include "db_connection1.php";
include "sessions.php";
/*$_SESSION['counter']=$_SESSION['counter']+1;10072024**/
$id=$_POST['id'];
$usernamer=$_POST['usernamer1'];

$query = "update videotips_videotips SET active = 'No' and uername = '$usernamer' where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    die("Link not found");
  }
header("refresh:2; url=videolinkadminmodule.php");  
?>