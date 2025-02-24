<?php 
session_start();
include "db_connection1.php"; 

$maincategory = $_POST['maincategory'];
$category = $_GET['category'];
$local_username=$_SESSION['email'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$updatedcategory = $_SESSION['updatedcategory'];



$query="UPDATE videotips_viodetipscategory SET maincategory = '$maincategory', category = '$category' where maincategory = $maincategory and category = $category and username = '$local_username'";
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