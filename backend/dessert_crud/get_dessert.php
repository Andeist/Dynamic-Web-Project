<?php
require_once '../../config/dbconn.php';
include '../functions/cleaner.php';

if (isset($_POST['id'])) {
    // Fetch dessert by ID
    $id = $_POST['id'];
    $query = "SELECT * FROM desserts WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    echo json_encode($row);
} else {
    // Fetch all desserts
    $query = "SELECT * FROM desserts";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);
}
?>
