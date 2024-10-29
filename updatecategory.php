<?php 
session_start();
include "db_connection1.php"; 
include "nobackpage.php";

$id = $_POST['id'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];


$query="UPDATE videotips_viodetipscategory SET id = '$id', maincategory = '$maincategory', category = '$category' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  echo 	"Categoría Actualizada";
  header("refresh:3; url=addcategory.php");
    }
  else{
      echo 	"Categoría No Actualizada";
      header("refresh:5; url=addcategory.php");
      }
?>