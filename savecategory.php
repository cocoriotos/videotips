<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
$maincategory=$_POST["maincategory"];



$query="INSERT INTO videotips_viodetipscategory (maincategory,username) values ('$maincategory','$local_username')";
$resultado= $conn ->query($query);


if ($resultado){
    $_SESSION['message']='Category Saved Successfully';
  $_SESSION['message_type']='Success';
  header("refresh:3; url=videolinkadminmodule.php");
  }
?>