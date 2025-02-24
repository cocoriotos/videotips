<?php 
session_start();
include "db_connection1.php"; 

$category = $_GET['category'];
$maincategory = $_GET['maincategory'];
$local_username=$_SESSION['email'];
$updatedcategory = $_SESSION['updatedcategory'];



$query="UPDATE videotips_viodetipscategory SET maincategory = '$maincategory', category = '$category' where  username = '$local_username'";
$resultado=$conn ->query($query);

if ($resultado){
  $_SESSION['updatedcategory']=1;
  header("refresh:0; url=addcategory.php");
  exit();
    }
  else{
    $_SESSION['updatedcategory']=2;
      header("refresh:0; url=addcategory.php");
      exit();
      }
?>