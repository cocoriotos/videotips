<?php 
// defining and loading  data fields

$name = $_POST['Name'];
$lastname = $_POST['LastName'];
$reportsto = $_POST['ReportsTo'];
$email = $_POST['Email'];
$country = $_POST['Country'];
$city = $_POST['City'];
$password = $_POST['password1'];


//Destination email information
$to ="$email";
$to.= "cocoriotos@hotmail.com";
$subject = "Urgent Links tool access request";
$message = "Good day Admin Team:  \n\n";
$message .= "This user is requesting tool access, please response ASAP \n\n";//. to concatenate lines in the same variable
$message .= "Member name            : $name \n";
$message .= "Member Last name       : $lastname \n";
$message .= "Member email           : $email \n\n";
$message .= "Member Password        : $password \n\n";
$message .= "Thank you for your support \n\n";
$message .= "Email Application sender";

//Sending Email 
mail($to, $subject, $message);
$query="INSERT INTO accessrequests(name, lastname, email, country, city, password) VALUES ('$name', '$lastname', '$email', '$country', '$city','$password')";
include ("db_connection1.php");
$result=$conn->query($query);

if ($result){
        echo "Your request was sent, please wait for Administrators message with agree or not response";
} else {
	echo "Request not send please try again";
       }
header("refresh:7;url=videotrackauth.php");
?>