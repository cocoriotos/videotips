<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];

$query="SELECT categorycounter from  videotips_app_access_list where username = '$local_username'";
$categorycounter= $conn ->query($query);


if($categorycounter < 6){

$query="INSERT INTO videotips_viodetipscategory (maincategory, category, username) values ('$maincategory','$category','$local_username')";
$resultado= $conn ->query($query);

$query1="INSERT INTO videotips_maincategory (maincategory, username) values ('$maincategory', '$local_username')";
$resultado1= $conn ->query($query1);


if ($resultado){
    
    $query2="UPDATE videotips_app_access_list SET categorycounter = categorycounter + 1  where username = '$local_username'";
    $categorycounter1= $conn ->query($query2);
    
    echo ("Category Saved");
    $_SESSION['message']='Category Saved Successfully';
    $_SESSION['message_type']='Success';
  header("refresh:7; url=addcategory.php");
  }
}else{
  echo ("You reach the 5 free subcategories registration, to continue adding more, please see our plans to");
  $_SESSION['message']='Subcategories not saved Successfully';
  $_SESSION['message_type']='No Success';
  header("refresh:7; url=addcategory.php");
}
?>