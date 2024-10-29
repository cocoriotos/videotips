<?php 
session_start();
include "db_connection1.php";
include "nobackpage.php";
include "SessionTimeOut.php";

$local_username=$_SESSION['email'];
$secondcategory=$_POST["secondcategory"];



$query="INSERT INTO videotips_viodetipscategory (category,username) values ('$secondcategory','$local_username')";
$resultado= $conn ->query($query);


if ($resultado){
  $_SESSION['message']='Categoría Salvada Exitosamente';
  $_SESSION['message_type']='Success';
  header("refresh:3; url=videolinkadminmodule.php");
  }
?>