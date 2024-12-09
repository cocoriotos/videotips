<?php 
// defining and loading  data fields
session_start();
include ("db_connection1.php");

$email = $_POST['email'];

$query3="SELECT password from videotips_app_access_list where email = '$email'";
$result3=$conn->query($query3);

$row = $result3->fetch_assoc();
$password = $row['password'];

if($result3->num_rows > 0){ 
/*Destination email information*/
$to = "adm@solicionespro.com";
$subject = "Urgent Recovery Password requested";
$message = "Good day Admin Team:  \n\n";
$message.= "This user is requesting password recovery to $email \n\n";//. to concatenate lines in the same variable
$message.= "Thank you for your support \n\n";
$message.= "Email Application sender";
$message.= "Dear Customer, you will be receiving Tool admin message advising if was granted or denied your request \n\n";
$message.= "Email Application sender";
$header= "From: adm@solicionespro.com" . "\r\n";
$header.= "Bcc: cocoriotos@hotmail.com\r\n";
$header.= "Reply-To: noreply@solicionespro.com" . "\r\n";
$header.= "X-Mailer: PHP/". phpversion();

//Sending Email 
$mail = mail($to, $subject, $message,$header);


	$to = "$email";
	$subject = "Solicitud de Recuperación de Password";
	$message = "Buen día $email :  \n\n";
	$message.= "Su requerimiento de recuperación de Contraseña ha sido procesada. Acá la información de su solicitud \n\n";//. to concatenate lines in the same variable
	$message.= str_pad("Email", 40) . ": $email \n";
	$message.= str_pad("Contraseña", 40) . ": $password \n\n";
	$message.= "Por favor no responder éste correo \n\n";
	$message.= "Gracias por su solicitud, ya puede ingresar a la app desde este enlace https://solicionespro.com/videotips/videotrackerauth.php con su usuario $email  y la contraseña correspondiente. \n\n";
	$header = "From: adm@solicionespro.com" . "\r\n";
	/*$header.= "Bcc: cocoriotos@hotmail.com\r\n";*/
	$header.= "X-Mailer: PHP/". phpversion();
	
	$mail1 = mail($to,$subject,$message,$header);
    include("recoveryemailsuccess.php");
    header("refresh:0; url=videotrackerauth.php");
	exit();
}else {
    include("emailnotfound.php");
    header("refresh:0; url=videotrackerauth.php");
    exit();
} 
?>