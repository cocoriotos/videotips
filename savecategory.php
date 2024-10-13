<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];

$query="SELECT categorycounter from  videotips_app_access_list where username = '$local_username'";
$categorycounter= $conn ->query($query);
 
if ($categorycounter === false) {
  // Si la consulta falla, puedes mostrar el error
  echo "Error en la consulta: " . $conn->error;
} else {
  echo "Consulta ejecutada correctamente.";
}
?>

/*if ($categorycounter > 5){
  echo ("You reach the 5 free subcategories registration, to continue adding more, please see our plans to");
  $_SESSION['message']='Subcategories not saved Successfully';
  $_SESSION['message_type']='No Success';
  header("refresh:7; url=addcategory.php");
}

if ($categorycounter < 6){
  $query1="INSERT INTO videotips_viodetipscategory (maincategory, category, username) values ('$maincategory','$category','$local_username')";
  $resultado1= $conn ->query($query1);
  $query2="INSERT INTO videotips_maincategory (maincategory, username) values ('$maincategory', '$local_username')";
  $resultado2= $conn ->query($query2);
  if ($resultado){
      $query3="UPDATE videotips_app_access_list SET categorycounter = categorycounter + 1  where username = '$local_username'";
      $categorycounter3= $conn ->query($query3);
      echo ("Category Saved");
      $_SESSION['message']='Category Saved Successfully';
      $_SESSION['message_type']='Success';
      header("refresh:7; url=addcategory.php");
      } 
    }
?>*/