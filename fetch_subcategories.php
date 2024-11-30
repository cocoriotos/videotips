<?php
session_start();
include "db_connection1.php";
$local_username = $_SESSION['email'];

$maincategory = $_GET['maincategory'] ?? '';

if ($maincategory) {
    $sql = "SELECT DISTINCT category 
            FROM videotips_viodetipscategory 
            WHERE maincategory = ? AND username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $maincategory, $local_username);
    $stmt->execute();
    $result = $stmt->get_result();

    $subcategories = [];
    while ($row = $result->fetch_assoc()) {
        $subcategories[] = $row;
    }

    echo json_encode($subcategories);
} else {
    echo json_encode([]);
}
?>
