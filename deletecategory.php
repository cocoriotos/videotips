<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['username'];

$query = "delete from videotips_viodetipscategory where id='$id'";
$result = mysqli_query($conn,$query);
if (!$result) {
    die("Link not found");
  }
echo 	"Register deleted";
header("refresh:3; url=addcategory.php");  
?>