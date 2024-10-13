<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];

$query="SELECT categorycounter from  videotips_app_access_list where username = '$local_username'";
$categorycounter= $conn ->query($query);


if($categorycounter > 3){

$query="INSERT INTO videotips_viodetipscategory (maincategory, category, username) values ('$maincategory','$category','$local_username')";
$resultado= $conn ->query($query);

$query1="INSERT INTO videotips_maincategory (maincategory, username) values ('$maincategory', '$local_username')";
$resultado1= $conn ->query($query1);


if ($resultado){
    $_SESSION['message']='Category Saved Successfully';
  $_SESSION['message_type']='Success';
  header("refresh:3; url=addcategory.php");
  }

  if ($resultado1){
    $_SESSION['message']='Category Saved Successfully';
  $_SESSION['message_type']='Success';
  header("refresh:3; url=addcategory.php");
  }

}else{
  echo ("Suscription issued, please renue to continue enjoy your favorite links");
  header("refresh:3; url=addcategory.php");
}
?>