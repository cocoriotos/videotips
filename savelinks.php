<?php 
session_start();
include "db_connection1.php";



$local_username = $_SESSION['email'];
$videolink = $_POST['videolink'];
$maincategory = $_POST["maincategory"];
$category = $_POST["category"];
$description = $_POST["description"];
$savedlink = $_SESSION['savedlink'];
$duplicatedlink = $_SESSION['duplicatedlink'];
$suscriptioninactive = $_SESSION['suscriptioninactive'];


// Verificar suscripción activa
$query = "SELECT suscriptionactive FROM videotips_app_access_list WHERE username = '$local_username'";
$activesuscription = $conn->query($query);
$suscription_row = $activesuscription->fetch_assoc();
$is_active = $suscription_row['suscriptionactive'] ?? 0; // Asegúrate de que sea un valor numérico

// Verificar si el enlace ya existe
$query1 = "SELECT * FROM videotips_videotips WHERE videolink = '$videolink' AND username = '$local_username'";
$urlduplicated = $conn->query($query1);

if ($urlduplicated->num_rows > 0) { 
    $_SESSION['duplicatedlink'] = 1;
    header("refresh:0; url=videolinkadminmodule.php");
    exit();
} 

if ($is_active == 1) {
    // Intentar insertar el enlace
    $query3 = "INSERT INTO videotips_videotips (videolink, maincategory, category, description, active, username) 
                VALUES ('$videolink', '$maincategory', '$category', '$description', 'Yes', '$local_username')";
    
    if ($conn->query($query3) === TRUE) {
        
        $_SESSION['savedlink']=1;
        exit();
        /* include ("link_saved_success.php");*/
        
        /*echo "<h4>Enlace Salvado Exitosamente</h4>";*/
        
    } else {
      /*echo "Valor de suscriptionactive: " . $is_active;*/
      $_SESSION['savedlink']=2;
      exit();
    }
} else {
    /*echo "Valor de suscriptionactive: " . $is_active;*/
    $_SESSION['suscriptioninactive']=1;
    $_SESSION['savedlink']=0;
    exit();
    /*echo "<h4>Suscripción inactiva. Por favor, renueva tu suscripción.</h4>";*/
}
?>