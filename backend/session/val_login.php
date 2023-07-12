<?php
session_start();
require_once '../../config/dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $query->bind_param("s", $username,);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Store user information in session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_username'] = $row['username'];

        if (password_verify($password, $row ["password"])) {
            $_SESSION['user_username'] = $username;
            $response = [
                'status' => 'success',
                'message' => 'Login successful.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid password.',
                "test" => $row['password']
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'User not found.'
        ];
    }

    echo json_encode($response);
}
?>
