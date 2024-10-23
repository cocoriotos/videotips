<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['email'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];


$query="SELECT suscriptionactive from  videotips_app_access_list where username = '$local_username'";
$activesuscription= $conn ->query($query);

$query1="SELECT * from  videotips_videotips where videolink = '$videolink' and username = '$local_username'";
$urlduplicated= $conn ->query($query1);



if($urlduplicated->num_rows > 0){ 
  echo ("Link duplicated, review and use another one");
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
} else {
if($activesuscription === 1){

$query3="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active,username) values ('$videolink','$maincategory','$category','$description','Yes','$local_username')";
$resultado= $conn ->query($query3);

$query4="INSERT INTO videotips_app_access_list (categorycounter) values ('categorycounter++')";
$resultado= $conn ->query($query4);


}

if ($resultado){
    $_SESSION['message']='Link Saved Successfully';
  $_SESSION['message_type']='Success';
  
  header("refresh:3; url=videolinkadminmodule.php");
  }
else{
  echo ("Suscription issued, please renue to continue enjoy your favorite links");
  header("refresh:3; url=videolinkadminmodule.php");
}
}
?>