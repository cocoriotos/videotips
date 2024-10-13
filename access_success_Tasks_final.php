<html>

<?php 

GLOBAL $global_username;
    session_start();	
$global_username=$_POST['username'];
$_SESSION['username']=$global_username;/*POST veriable assinged to global session usernamer global10112024*/
$local_username=$_SESSION['username'];/*10082024*/
$password=$_POST['password'];



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
		$query1="select * from videotips_app_access_list where username='$local_username' and active='1' and password='$password'"; /*if username is user role 10082024*/
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
