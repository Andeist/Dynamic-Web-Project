<?php
session_start();
require_once '../../config/dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['adminUsername'];
    $password = $_POST['adminPassword'];

    $query = $conn->prepare("SELECT id, username, password FROM admins WHERE username = ? and password = ?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

            // Store user information in session variables
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];

            $response = [
                'status' => 'success',
                'message' => 'Login successful.'
            ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Admin not found.'
        ];
    }

    echo json_encode($response);
}
?>
