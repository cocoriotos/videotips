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
echo 	"<ha>Categoría Borrada. Al borrar una subcategoría esta queda registrada como usada dentro de subcategorías gratis</ha>";
header("refresh:3; url=addcategory.php");  
?>