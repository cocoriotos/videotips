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

/*$query="INSERT INTO accessrequests(name, lastname, email, country, city, password) VALUES ('$name', '$lastname', '$email', '$country', '$city','$password')";
$result=$conn->query($query);*/


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
	include("requestaccessfinal.php");
	exit();
	}

	$to1 = "$email, cocoriotos@hotmail.com";
	$subject1 = "Requerimiento de acceso";
	$message1 = "Buen día $lastname, $name :  \n\n";
	$message1.= "Su requerimiento ha sido enviado a los administradores de la herramienta  para processar su solicitud, por favor esperar la respuesta vía correo electrónico. Acá la información de su solicitud \n\n";//. to concatenate lines in the same variable
	$message1.= "Nombre                           : $name \n";
	$message1.= "Apellido                         : $lastname \n";
	$message1.= "Email                            : $email \n";
	$message1.= "País                             : $country \n";
	$message1.= "Ciudad                           : $city \n";
	$message1.= "Nombre de usuario  espareado     : $lastname, $name \n\n";
	$message1.= "Por favor no responder éste correo \n\n";
	$message1.= "Gracias por su paciencia \n\n";
	$header1 = "From: adm@solicionespro.com" . "\r\n";
	$header1.= "X-Mailer: PHP/". phpversion();
	
	$mail1 = mail($to1,$subject1,$message1,$header1);
	if ($mail1) {
		echo "<h4> ¡Enviado exitosamente!</h4>";
		include("requestaccessfinal.php");
		exit();
		}

if ($result){
        echo "Your request was sent, please wait for Administrators message with agree or not response";
} else {
	echo "Request not send please try again";
	include("requestaccessfinal.php");
       }
header("refresh:7;url=videotrackerauth.php");
?>