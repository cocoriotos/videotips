<?php 
session_start();
include "db_connection1.php"; 

$id = $_POST['id'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$updatedcategory = $_SESSION['updatedcategory'];


$query="UPDATE videotips_viodetipscategory SET id = '$id', maincategory = '$maincategory', category = '$category' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  $_SESSION['updatedcategory']=1;
  header("refresh:0; url=addcategory.php");
  exit();
    }
  else{
    $_SESSION['updatedcategory']=2;
      header("refresh:0; url=addcategory.php");
      }
?>