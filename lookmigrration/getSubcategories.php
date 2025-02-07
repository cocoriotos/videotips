<?php
session_start();
include "db_connection1.php";

$maincategory = $_GET['maincategory'];
$local_username = $_SESSION['email'];

$SQLSELECT = "SELECT distinct(category) FROM videotips_viodetipscategory WHERE username = '$local_username' AND maincategory = '$maincategory' ORDER BY category ASC"; 
$result_set = mysqli_query($conn, $SQLSELECT);

$options = "<option value=''>Seleccione una subcategoría</option>";
while ($rows = $result_set->fetch_assoc()) { 
    $category = $rows['category']; 
    $options .= "<option value='$category'>$category</option>";
}

echo $options;
?>