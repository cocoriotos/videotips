<?php 
session_start();
include "db_connection1.php"; 


$id = $_POST['id'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];
$updatedlink = $_SESSION['updatedlink'];


$query="UPDATE videotips_videotips SET id = '$id', videolink = '$videolink', maincategory = '$maincategory', category = '$category', description = '$description', active = 'Yes' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  $_SESSION['updatedlink'] = 1;
  header("refresh:0; url=videolinkadminmodule.php");
    }
  else{
      $_SESSION['updatedlink'] = 2;
      header("refresh:0; url=videolinkadminmodule.php");
      }
?>