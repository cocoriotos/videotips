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


$query="UPDATE videotips_videotips SET id = '$id', videolink = '$videolink', maincategory = '$maincategory', category = '$category', description = '$description', active = 'Yes' where id = '$id'";
$resultado=$conn ->query($query);

if ($resultado){
  include("link_updated_sucsess.php");
  header("refresh:0; url=videolinkadminmodule.php");
    }
  else{
      include("link_No_updated_sucsess.php");
      header("refresh:0; url=videolinkadminmodule.php");
      }
?>