<?php 
include "db_connection1.php";
include "sessions.php";
$_SESSION['counter']=$_SESSION['counter']+1;
$id=$_POST['id'];

$query = "update videotips_videotips SET active = 'No' where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    die("Link not found");
  }
header("refresh:5; url=videolinkadminmodule.php");  
?>