<?php 
session_start();
include "db_connection1.php";


$local_username=$_SESSION['username'];
$videolink = $_POST['videolink'];
$maincategory=$_POST["maincategory"];
$category=$_POST["category"];
$description=$_POST["description"];


$query="INSERT INTO videotips_videotips (videolink,maincategory,category,description,active,username) values ('$videolink','$maincategory','$category','$description','Yes','$local_username')";
$resultado= $conn ->query($query);


if (!$resultado) {
  if ($conn->errno == 1062) {
      // Error de duplicidad (1062)
      $_SESSION['message'] = "Error: La dirección que está tratando de ingresar ya existe";
      $_SESSION['message_type'] = 'Error';
  } else {
      // Otros errores posibles
      $_SESSION['message'] = 'Error al guardar el link';
      $_SESSION['message_type'] = 'Error';
  }
  // Redirigir tras el error
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
} else {
  // Si la consulta fue exitosa
  $_SESSION['message'] = 'Link Saved Successfully';
  $_SESSION['message_type'] = 'Success';
  header("refresh:3; url=videolinkadminmodule.php");
  exit();
}



/*if ($resultado){
  if ($conn->errno == 1062){
    echo "Error: La dirección que está tratando de ingresar ya existe";
    header("refresh:3; url=videolinkadminmodule.php");
  } else{
  $_SESSION['message']='Link Saved Successfully';
  $_SESSION['message_type']='Success';
  header("refresh:3; url=videolinkadminmodule.php");
  }
  }*/
?>