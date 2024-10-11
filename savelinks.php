<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
/**include "sessions.php";*/
$_SESSION['counter']=$_SESSION['counter']+1;

$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];


$query="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active,username) values ('$videolink','$maincategory','$category','$description','Yes','$local_username')";
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