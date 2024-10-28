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
  echo ("Enlace duplicado, usar otro");
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
} else {
if($activesuscription == 1){
$query3="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active,username) values ('$videolink','$maincategory','$category','$description','Yes','$local_username')";
$resultado= $conn ->query($query3);
$query4="INSERT INTO videotips_app_access_list (categorycounter) values ('categorycounter++')";
$resultado1= $conn ->query($query4);
  echo ("Enlace Salvado Exitosamente");
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
}

if ($resultado){
  echo ("Enlace Salvado Exitosamente");
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
  }
else{
  echo ("Suscripción vencida, por favor renovarla para continuar disfrutando de su biblioteca de sus enlaces favoritos");
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
}
}
?>