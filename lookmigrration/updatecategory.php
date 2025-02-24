<?php 
session_start();
include "db_connection1.php"; 

$id = $_GET['id'];
$maincategory=$_GET["maincategory"];
$category=$_GET["category"];
$local_username=$_SESSION['email'];
$updatedcategory = $_SESSION['updatedcategory'];



$query="UPDATE videotips_viodetipscategory1 SET maincategory = '$maincategory', category = '$category' where  id = '$id'";
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