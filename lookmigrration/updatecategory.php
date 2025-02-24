<?php 
session_start();
include "db_connection1.php"; 

$id = $_GET['id'];
$maincategory=$_POST["maincategory1"];
$category=$_POST["category1"];
$local_username=$_SESSION['email'];
$updatedcategory = $_SESSION['updatedcategory'];



$query="UPDATE videotips_viodetipscategory1 SET category = '$category', maincategory = '$maincategory'  where  id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  $_SESSION['updatedcategory']=1;
  header("refresh:0; url=editcategory.php");
  exit();
    }
  else{
    $_SESSION['updatedcategory']=2;
      header("refresh:0; url=addcategory.php");
      exit();
      }
?>