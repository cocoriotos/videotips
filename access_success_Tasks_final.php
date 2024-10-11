<html>

<?php 

GLOBAL $usernamer;/*10072024*/
/*if (session_status() === PHP_SESSION_NONE) {*/
    session_start();
/*}*/	
$username=$_POST['username'];
$password=$_POST['password'];
/*$_SESSION['usernamer']=$username;10112024*/
$count=0;
$_SESSION['counter']=$count;
$counter=$_SESSION['counter'];
$usernamer=$_SESSION['username'];/*10082024*/

	
	if($_POST)
 {
  $db_host="127.0.0.1";
  $db_user="u927778197_adm";
  $db_pass="C0mp13t3501ut10n5*";
  $db_name="u927778197_appsdb";
  $conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  if(mysqli_connect_errno()) 
			{	
			include("No_DB_Connectionfinal.php");
			include ("videotrackerauth.php");
			exit();
			}
  mysqli_select_db($conn,$db_name) or die ("<center>There is not Database available</center>");		

  if ($conn==true)
		{

		}
		$query1="select * from videotips_app_access_list where username='$usernamer' and active='1' and password='$password'"; /*if username is user role 10082024*/
		$result1=mysqli_query($conn, $query1);
	
		if(mysqli_num_rows($result1)==true)
			{	
			include("videolinkadminmodule.php");
			exit();	
			}
		else 
		{
		include ("access_not_successtasksfinal.php");
		}		
 }
?>	
</html>
