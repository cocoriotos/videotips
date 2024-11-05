<?php 
session_start();
include "db_connection1.php"; 



$id = $_POST['id'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];


$query="UPDATE videotips_viodetipscategory SET id = '$id', maincategory = '$maincategory', category = '$category' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  include("subcategory_updated_success.php");
  header("refresh:0; url=addcategory.php");
    }
  else{
    include("sucategory_No_updated.php");
      header("refresh:0; url=addcategory.php");
      }
?>