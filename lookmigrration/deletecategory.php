<?php 
include "db_connection1.php";
session_start();
$id = $_GET['id'];
$maincategory = $_GET['maincategory'];
$category = $_GET['category'];
$local_username=$_SESSION['email'];
$deletedcategory = $_SESSION['deletedcategory'];



$query = "delete from videotips_viodetipscategory1 where id='$id'";
$result = mysqli_query($conn,$query);



if ($result === TRUE) {
    $_SESSION['deletedcategory']=1;
    header("refresh:0; url=addcategory.php");
    exit();   
    }else{
    $_SESSION['deletedcategory']=2;
    header("refresh:0; url=addcategory.php");
    exit();
    }  
?>