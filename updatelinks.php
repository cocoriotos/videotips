<?php 
session_start();
include "db_connection1.php"; 

$id = $_POST['id'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];
$active=$_POST["active"];


$query="UPDATE videotips_videotips SET id = '$id', videolink = '$videolink', maincategory = '$maincategory', category = '$category', description = '$description', active = '$active' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  echo 	"link Updated";
  header("refresh:3; url=videolinkadminmodule.php");
    }
  else{
      echo 	"link Not Updated";
      header("refresh:5; url=videolinkadminmodule.php");
      }
?>