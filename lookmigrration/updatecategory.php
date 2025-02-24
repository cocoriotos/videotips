<?php 
session_start();
include "db_connection1.php"; 

$id = $_POST['id'];
$maincategory = $_POST["maincategory"];
$category = $_POST["category"];
/*$maincategory="mainCategorytest";
$category="Categorytest";*/
$local_username = $_SESSION['email'];
$updatedcategory = $_SESSION['updatedcategory'];

$query = $conn->prepare("UPDATE videotips_viodetipscategory1 SET category = ?, maincategory = ? WHERE id = ?");
$query->bind_param("ssi", $category, $maincategory, $id);
$resultado = $query->execute();

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