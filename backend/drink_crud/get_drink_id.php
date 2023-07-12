<?php
include('../../config/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = 'SELECT name, description, ingredients, image, directions, video_embed FROM drinks WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $drink = $result->fetch_assoc();
        $response = [
            'status' => 'success',
            'data' => $drink,
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to fetch drink details.',
        ];
    }

    $stmt->close();
    $conn->close();
    echo json_encode($response);
}
?>
