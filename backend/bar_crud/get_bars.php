<?php
require_once '../../config/dbconn.php';
include '../functions/cleaner.php';

if (isset($_POST['id'])) {
    // Fetch bar by ID
    $id = $_POST['id'];
    $query = "SELECT * FROM bars WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    echo json_encode($row);
} else {
    // Fetch all bars
    $query = "SELECT * FROM bars";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);
}
?>
