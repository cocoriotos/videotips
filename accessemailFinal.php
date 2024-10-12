<?php 
// defining and loading  data fields
session_start();
include ("db_connection1.php");

$name = $_POST['Name'];
$lastname = $_POST['LastName'];
$email = $_POST['Email'];
$country = $_POST['Country'];
$city = $_POST['City'];
$password = $_POST['password1'];

$query="INSERT INTO videotips_accessrequests(name, lastname, email, country, city, password) VALUES ('$name', '$lastname', '$email', '$country', '$city','$password')";
$result=$conn->query($query);


//Destination email information
$to = "cocoriotos@hotmail.com";
$subject = "Urgent Links tool access request";
$message = "Good day Admin Team:  \n\n";
$message.= "This user is requesting tool access, please response ASAP \n\n";//. to concatenate lines in the same variable
$message.= "Member name            : $name \n";
$message.= "Member Last name       : $lastname \n";
$message.= "Member email           : $email \n\n";
$message.= "Thank you for your support \n\n";
$message.= "Email Application sender";
$message.= "Dear Customer, you will be receiving Tool admin message advising if was granted or denied your request \n\n";
$message.= "Email Application sender";
$header= "From: adm@solicionespro.com" . "\r\n";
$header.= "Reply-To: noreply@solicionespro.com" . "\r\n";
$header.= "X-Mailer: PHP/". phpversion();

//Sending Email 
$mail = mail($to, $subject, $message,$header);
if ($mail) {
	echo "<h4> ¡Enviado exitosamente!</h4>";
	include("videotrackerauth.php");
	}

	$to = "$email, cocoriotos@hotmail.com";
	$subject = "Requerimiento de acceso";
	$message = "Buen día $lastname, $name :  \n\n";
	$message.= "Su requerimiento ha sido enviado a los administradores de la herramienta  para processar su solicitud, por favor esperar la respuesta vía correo electrónico. Acá la información de su solicitud \n\n";//. to concatenate lines in the same variable
	$message.= "Nombre                           : $name \n";
	$message.= "Apellido                         : $lastname \n";
	$message.= "Email                            : $email \n";
	$message.= "País                             : $country \n";
	$message.= "Ciudad                           : $city \n";
	$message.= "Nombre de usuario  espareado     : $lastname, $name \n\n";
	$message.= "Por favor no responder éste correo \n\n";
	$message.= "Gracias por su paciencia \n\n";
	$header = "From: adm@solicionespro.com" . "\r\n";
	$header.= "X-Mailer: PHP/". phpversion();
	
	$mail1 = mail($to,$subject,$message,$header);
	if ($mail1) {
		echo "<h4> ¡Enviado exitosamente!</h4>";
		include("videotrackerauth.php");
		}

if ($result){
        echo "Your request was sent, please wait for Administrators message with agree or not response";
} else {
	echo "Request not send please try again";
	include("videotrackerauth.php");
       }
header("refresh:7;url=videotrackerauth.php");
?>