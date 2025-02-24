<?php 
session_start();
include "db_connection1.php"; 

$id = $_POST['id'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$proforpers=$_POST["proforpers"];
$description=$_POST["description"];
$updatedlink = $_SESSION['updatedlink'];

$query="UPDATE videotips_videotips SET id = '$id', videolink = '$videolink', maincategory = '$maincategory', category = '$category', proforpers = '$proforpers', content = '$description',  active = 'Yes' where videolink = '$videolink'";
$resultado=$conn ->query($query);

if ($resultado){
  $_SESSION['updatedlink'] = 1;
  header("refresh:0; url=videolinkadminmodule.php");
  exit();
    }
  else{
      $_SESSION['updatedlink'] = 2;
      header("refresh:0; url=videolinkadminmodule.php");
     exit(); 
     }
?>