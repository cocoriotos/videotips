<?php 
include "sessions.php";
foreach ($_SESSION as $key => $value) {
    if (empty($value)) {
        // Cerrar la conexión antes de redirigir
        if (isset($conn)) {
            $conn->close();
        }
        header("Location: videotrackerauth.php");
        exit;
    }
}
?>