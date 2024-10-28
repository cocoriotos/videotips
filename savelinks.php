<?php 
session_start();
include "db_connection1.php";

$local_username = $_SESSION['email'];
$videolink = $_POST['videolink'];
$maincategory = $_POST["maincategory"];
$category = $_POST["category"];
$description = $_POST["description"];

// Verificar suscripción activa
$query = "SELECT suscriptionactive FROM videotips_app_access_list WHERE username = '$local_username'";
$activesuscription = $conn->query($query);
$suscription_row = $activesuscription->fetch_assoc();
$is_active = $suscription_row['suscriptionactive'] ?? 0; // Asegúrate de que sea un valor numérico

$query1 = "SELECT * FROM videotips_videotips WHERE videolink = '$videolink' AND username = '$local_username'";
$urlduplicated = $conn->query($query1);

if ($urlduplicated->num_rows > 0) { 
    echo "Enlace duplicado, usar otro";
    header("refresh:3; url=videolinkadminmodule.php");
    exit();
} else {
    if ($is_active === 1) {
        // Intentar insertar el enlace
        $query3 = "INSERT INTO videotips_videotips (videolink, maincategory, category, description, active, username) 
                    VALUES ('$videolink', '$maincategory', '$category', '$description', 'Yes', '$local_username')";
        $resultado = $conn->query($query3);
        
        // Solo insertar en la lista de acceso si la inserción anterior fue exitosa
        if ($resultado) {
                echo "Enlace Salvado Exitosamente";
            }
        } else {
            echo "Error al guardar el enlace.";
        }
        header("refresh:3; url=videolinkadminmodule.php");
        exit();
}
?>