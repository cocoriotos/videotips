<?php 
include "db_connection1.php"; 
session_start();


$id = $_POST['id'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];
$active=$_POST["active"];
$usernamer=$_SESSION['usernamer'];
$_SESSION['counter']=$_SESSION['counter']+1;


$query="UPDATE videotips_videotips SET id = '$id', videolink = '$videolink', maincategory = '$maincategory', category = '$category', description = '$description', active = '$active', username = '$usernamer' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  echo 	"link Updated";
  $_SESSION['message']='Updated Successfully';
  $_SESSION['message_type']='Success';
  header("refresh:0; url=videolinkadminmodule.php");
    }
  else{
      echo 	"link Not Updated";
      header("refresh:5; url=videolinkadminmodule.php");
      }
?>