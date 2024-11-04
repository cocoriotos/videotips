<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include "header.php";
include "db_connection1.php";
$local_username=$_SESSION['email'];
include "nobackpage.php";
include "SessionTimeOut.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscription Payment</title>
    <script src="head.js" defer></script>
</head>
<body>
    <div class="form-group">
        <center><input type="button" class="btn btn-success btn-block" value="Pago por Nequi" onclick="window.open('https://clientes.nequi.com.co/recargas', '_blank');"></center><br><br>
    </div>
</body>
</html>