<?php 
session_start();
/*include "db_connection1.php";10082024*/
/**include "sessions.php";*/
$_SESSION['counter']=$_SESSION['counter']+1;

$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];
/*$username=$_GET['username'];10072024*/
/*$usernamer=$_POST['usernamer1'];10072024*/
//$usernamer=$_SESSION['usernamer'];/*10072024*/


$query="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active,username) values ('$videolink','$maincategory','$category','$description','Yes','$usernamer')";
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