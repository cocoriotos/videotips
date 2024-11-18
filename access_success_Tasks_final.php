<html>
<?php 

GLOBAL $global_username;
GLOBAL $savedlink;
GLOBAL $deletedlink;
GLOBAL $updatedlink;
GLOBAL $savedcategory;
GLOBAL $deletedcategory;
GLOBAL $updatedcategory;
GLOBAL $suscriptiondue;
session_start();
$_SESSION['savedcategory']=0;
$_SESSION['savedlink']=0;
$_SESSION['deletedcategory']=0;
$_SESSION['deletedlink']=0;
$_SESSION['updatedcategory']=0;
$_SESSION['updatedlink']=0;
$_SESSION['suscriptiondue']=0;
$savedlink = $_SESSION['savedlink'];
$deletedlink = $_SESSION['deletedlink'];
$updatedlink = $_SESSION['updatedlink'];
$savedcategory = $_SESSION['savedcategory'];
$deletedcategory = $_SESSION['deletedcategory'];
$updatedcategory = $_SESSION['updatedcategory'];
$suscriptiondue = $_SESSION['suscriptiondue'];
$global_username=$_POST['email'];
$_SESSION['email']=$global_username;/*POST veriable assinged to global session usernamer global10112024*/
$local_username=$_SESSION['email'];/*10082024*/
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
		mysqli_select_db($conn,$db_name) or die ("<center>No hay conexión disponible a la aplicación</center>");		

		if ($conn==true)
				{

				}
				
				$query2="update videotips_app_access_list SET suscriptiondaysleft = DATEDIFF(CURDATE(), registrationdate) where username ='$local_username'"; 
				$result2=mysqli_query($conn, $query2);

				$stmt = $conn->prepare("SELECT suscriptiondaysleft FROM videotips_app_access_list WHERE username = ?");
				$stmt->bind_param("s", $local_username);
				$stmt->execute();
				$result3 = $stmt->get_result();
				$suscriptiondaysleft = $result3->fetch_assoc()['suscriptiondaysleft'];

				$stmt = $conn->prepare("SELECT suscriptionpayed FROM videotips_app_access_list WHERE username = ?");
				$stmt->bind_param("s", $local_username);
				$stmt->execute();
				$result4 = $stmt->get_result();
				$suscriptionpayed = $result4->fetch_assoc()['suscriptionpayed'];

				$query1="select * from videotips_app_access_list where email='$local_username' and active='1' and password='$password'"; 
				$result1=mysqli_query($conn, $query1); 

				/*$query3="update videotips_suscription_payments SET categoriescounts = (select categorycount from videotips_app_access_list where username = '$local_username'), currentdate = CURDATE(), active = (select active from videotips_app_access_list where username = '$local_username'), suscriptiondate = (select registrationdate from videotips_app_access_list where username = '$local_username')   where username = '$local_username' and active='1'"; 
				$result3=mysqli_query($conn, $query3);*/

				if ($suscriptiondaysleft > 8 && $suscriptionpayed == 0) {
					$_SESSION['suscriptiondue']=1;
					header("refresh:0; url=suscriptionpayment.php");
					exit();
				  }else{	
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
 }
?>	
</html>
