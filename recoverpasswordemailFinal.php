<?php 
// defining and loading  data fields
session_start();
include ("db_connection1.php");

$email = $_POST['email'];

$query3="SELECT * from videotips_app_access_list where email = '$email'";
$result3=$conn->query($query3);

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
	$subject = "Requerimiento de acceso";
	$message = "Buen día $lastname, $name :  \n\n";
	$message.= "Su requerimiento ha sido enviado a los administradores de la herramienta  para processar su solicitud. Acá la información de su solicitud \n\n";//. to concatenate lines in the same variable
	$message.= str_pad("Nombre", 40) . ": $name \n";
	$message.= str_pad("Apellido", 40) . ": $lastname \n";
	$message.= str_pad("Email", 40) . ": $email \n";
	$message.= str_pad("País", 40) . ": $country \n";
	$message.= str_pad("Ciudad", 40) . ": $city \n";
	$message.= str_pad("Nombre de usuario  asignado", 40) . ": $email \n\n";
	$message.= "Por favor no responder éste correo \n\n";
	$message.= "Gracias por su registro, ya puede ingresar a la app desde este enlace https://solicionespro.com/videotips/videotrackerauth.php con su usuario $email  y la contraseña que escogió. \n\n";
	$header = "From: adm@solicionespro.com" . "\r\n";
	$header.= "Bcc: cocoriotos@hotmail.com\r\n";
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