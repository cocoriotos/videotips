<?php 
include "db_connection1.php";
$id=$_POST['id'];
$local_username=$_SESSION['username'];
$deletedlink = $_SESSION['deletedlink'];

/*$query = "update videotips_videotips SET active = 'No' and username = '$local_username' where id='$id'";*/
$query = "delete from videotips_videotips where id='$id'";
$result = mysqli_query($conn,$query);
if ($result) {
    $_SESSION['deletedlink']=1;
    header("refresh:0; url=videolinkadminmodule.php");  
    exit();
  }else{
$_SESSION['deletedlink']=2;
header("refresh:0; url=videolinkadminmodule.php");  
exit();
}
?>