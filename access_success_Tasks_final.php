<html>

<?php /*Developed by julián González Bucheli*/

//Defining local procedure variables and assigning POST form values into
GLOBAL $username;	
$username=$_POST['username'];
$password=$_POST['password'];


	
	if($_POST)
 {
  $db_host="127.0.0.1";
  $db_user="u927778197_adm";
  $db_pass="C0mp13t3501ut10n5*";
  $db_name="u927778197_appsdb";
  //$username=$_POST['username'];
  $conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);/*$conn store the parameter information */
  if(mysqli_connect_errno()) /*if mysql connection is not success then will generate error message*/
			{	
			/*alert("ALERT: DB not connected");*/
			include("No_DB_Connectionfinal.php");
			include ("videotrackerauth.php");
			exit();/*Break php file and next lines*/
			}
  mysqli_select_db($conn,$db_name) or die ("<center>There is not Database available</center>");/*database is not available*/			

  if ($conn==true)
		{

		}

		//$insert="update accesslist SET visits=visits+1 where (username='$username' and password='$password')"; /*username Vistit counter increas in 1*/
        //$result=mysqli_query($conn, $insert);
		//$query1="select * from livraria_accesslist where username='$username' and active='1' and password='$password'"; /*if username is user role*/
		$query1="select * from videotips_app_access_list where username='$username' and active='1' and password='$password'"; /*if username is user role*/
		$result1=mysqli_query($conn, $query1);
		//$query1="select * from livraria_accesslist where username='$username' and active='1' and role='user' and password='$password'"; /*if username is user role*/
		//$result1=mysqli_query($conn, $query1);
		//$query2="select * from accesslist where username='$username' and active='1' and role='admin' and password='$password'"; /*if username is admin role*/
		//$result2=mysqli_query($conn, $query2);
		//$query3="update channel_cases_escalated_row_data set case_closed_date=current_date() where status = 'In Progress'";
		//$result3=mysqli_query($conn, $query3);
        //current_date()//

		
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
 
 /*mysqli_close($conn);*/
?>
	
	
</html>
