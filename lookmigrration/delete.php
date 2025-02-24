<?php 
session_start();
include "db_connection1.php";
$id=$_POST['id'];
$videolink=$_POST['videolink'];
$local_username=$_SESSION['username'];
$deletedlink = $_SESSION['deletedlink'];
$query = "delete from videotips_videotips where videolink='$videolink' and id='$id'";
$result = mysqli_query($conn,$query);
if ($result) {
  $_SESSION['deletedlink'] = 1; 
    header("refresh:0; url=videolinkadminmodule.php");  
    exit();
  }else{
    $_SESSION['deletedlink'] = 2;
header("refresh:0; url=videolinkadminmodule.php");  
exit();
}
?>