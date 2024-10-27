<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['email'];

$query = "delete from videotips_viodetipscategory where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    /*die("Category not found");*/
    die("Categoría no encontrada");
  }
/*echo 	"Category deleted";*/
echo 	"Categoría Borrada";
header("refresh:3; url=addcategory.php");  
?>