<?php
require_once '../../config/dbconn.php';
include '../functions/cleaner.php';

if (isset($_POST['id'])) {
    // Fetch drink by ID
    $id = $_POST['id'];
    $query = "SELECT * FROM drinks WHERE id='$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    echo json_encode($row);
} else {
    // Fetch all drinks
    $query = "SELECT * FROM drinks";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($data);
}

