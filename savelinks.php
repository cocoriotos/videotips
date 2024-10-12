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
  if ($conn->errno === 1062) {
      // Error de duplicidad (1062)
      $_SESSION['message'] = "Error: La dirección que está tratando de ingresar ya existe";
      $_SESSION['message_type'] = 'Error';
      echo "<div style='text-align: center; padding: 20px; border: 1px solid red; background-color: #f8d7da; color: #721c24;'>
      <h2>{$_SESSION['message']}</h2>
      <p><a href='videolinkadminmodule.php' style='text-decoration: none; color: #fff; background-color: #007bff; padding: 10px 20px; border-radius: 5px;'>Haz clic aquí para continuar</a></p>
      </div>";
    exit(); // Asegúrate de detener la ejecución después del mensaje
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