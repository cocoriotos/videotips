<?php 
session_start();
include "db_connection1.php"; 
include "nobackpage.php";
include "SessionTimeOut.php";

$id = $_POST['id'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];


$query="UPDATE videotips_viodetipscategory SET id = '$id', maincategory = '$maincategory', category = '$category' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  echo "<h4>Categoría Actualizada</h4>";
  header("refresh:3; url=addcategory.php");
    }
  else{
      echo "<h4>Categoría No Actualizada</h4>";
      header("refresh:5; url=addcategory.php");
      }
?>