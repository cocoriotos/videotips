<?php 
session_start();
include "db_connection1.php"; 
include "nobackpage.php";
include "SessionTimeOut.php";

$id = $_POST['id'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];
$active=$_POST["active"];


$query="UPDATE videotips_videotips SET id = '$id', videolink = '$videolink', maincategory = '$maincategory', category = '$category', description = '$description', active = '$active' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  echo 	"Enlace Actualizado";
  $_SESSION['message']='Enalce Actualizado Exitosamente';
  $_SESSION['message_type']='Success';
  header("refresh:0; url=videolinkadminmodule.php");
    }
  else{
      echo 	"Enlace Actualizado Exitosamente";
      $_SESSION['message']='Enlace Actualizado Exitosamente';
      $_SESSION['message_type']='Not Success';
      header("refresh:5; url=videolinkadminmodule.php");
      }
?>