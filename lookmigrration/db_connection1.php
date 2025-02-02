<!--Developed by julian Gonzalez-->
<?php
  $db_host="127.0.0.1";
  $db_user="u927778197_adm";
  $db_pass="C0mp13t3501ut10n5*";
  $db_name="u927778197_appsdb";
  $conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  if(mysqli_connect_errno()) 
			{
			echo "<ha>Conexión a la aplicación no exitosa</ha>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			exit();
			}		
  mysqli_select_db($conn,$db_name) or die ("La aplicación no está disponible");/*database is not available*/			
  if ($conn==true)
			  {
			  }
?>
