<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];


$query="SELECT suscriptionactive from  videotips_app_access_list where username = '$local_username'";
$activesuscription= $conn ->query($query);


if($activesuscription == 1)

$query="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active,username) values ('$videolink','$maincategory','$category','$description','Yes','$local_username')";
$resultado= $conn ->query($query);

/*Avoid duplicated URLs*/

/*try {
  if ($conn->query($query) === TRUE) {
      echo "Registro insertado exitosamente";
  } else {
      throw new Exception($conn->error, $conn->errno);
  }
} catch (Exception $e) {
  // Verificar si el código de error es 1062 (duplicidad)
  if ($e->getCode() == 1062) {
      echo "Error: Ya existe una página igual registrada. Por favor, usa otra.";
      exit;
  } else {
      // Para cualquier otro error
      echo "Error: Hay un error. Por favor, intentar nuevamente.";
      exit;
  }
}*/



if ($resultado){
    $_SESSION['message']='Link Saved Successfully';
  $_SESSION['message_type']='Success';
  
  header("refresh:3; url=videolinkadminmodule.php");
  }
else{
  echo ("Suscription issued, please renue to continue enjoy your favorite links");
  header("refresh:3; url=addcategory.php");
}
?>