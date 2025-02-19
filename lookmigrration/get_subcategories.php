<?php
include "db_connection1.php";
session_start();

$local_username = $_SESSION['email'];
$maincategory = $_GET['maincategory'];

if (!empty($maincategory)) {
    $query = "SELECT DISTINCT category FROM videotips_viodetipscategory 
              WHERE maincategory = '$maincategory' AND username = '$local_username' 
              ORDER BY category ASC";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='{$row['category']}'>{$row['category']}</option>";
    }
}
?>

