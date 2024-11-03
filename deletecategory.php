<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['email'];

$query = "delete from videotips_viodetipscategory where id='$id'";
$result = mysqli_query($conn,$query);



if (!$result && !$result1) {
    /*die("Category not found");*/
    die("Subcategoría no encontrada");
  }
/*echo 	"Category deleted";*/
include("categoryDeletedMessage.php");
header("refresh:0; url=addcategory.php");  
?>