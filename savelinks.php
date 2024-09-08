<?php 
include "db_connection1.php";

$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];



$query="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active) values ('$videolink','$maincategory','$category','$description','Yes')";
$resultado= $conn ->query($query);

if ($resultado){
  $_SESSION['message']='Link Saved Successfully';
  $_SESSION['message_type']='Success';
  header("refresh:1; url=videolinkadminmodule.php");
    }
  else{
      echo 	"Link Not Saved";
      header("refresh:1; url=videolinkadminmodule.php");
      }
?>