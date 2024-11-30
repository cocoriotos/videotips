<?php
session_start();
include "db_connection1.php";
$username = $_SESSION['email'];

$subcategory = $_GET['subcategory'] ?? '';

if ($subcategory) {
    $sql = "SELECT DISTINCT maincategory 
            FROM videotips_viodetipscategory 
            WHERE category = ? AND username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $subcategory, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    echo json_encode($categories);
} else {
    echo json_encode([]);
}
?>
