<?php
session_start();
require_once '../../config/dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $query->bind_param("sss", $username, $hashedPassword, $email);

    if ($query->execute()) {
        $response = [
            'status' => 'success',
            'message' => 'Registration successful.'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Registration failed.'
        ];
    }

    echo json_encode($response);
}
?>
