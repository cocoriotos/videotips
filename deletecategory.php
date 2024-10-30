<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['email'];


$query = "delete from videotips_viodetipscategory where id='$id'";
$result = mysqli_query($conn,$query);

$query1 = "UPDATE videotips_app_access_list SET categorycounter = categorycounter - 1 WHERE username = '$local_username'";
$result1 = mysqli_query($conn,$query1);

if (!$result) {
    /*die("Category not found");*/
    die("Categoría no encontrada");
  }
/*echo 	"Category deleted";*/
echo 	"<ha>Categoría Borrada</ha>";
header("refresh:3; url=addcategory.php");  
?>