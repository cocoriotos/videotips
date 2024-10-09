<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (($_SESSION['counter'])==0) {
/*$usernamer=$_SESSION['usernamer']; 10082024*/
$counter=$_SESSION['counter'];
$usernamer=$_SESSION['usernamer'];
}
?> 