<?php
include('../../config/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = 'SELECT name, image, gmaps_location, web_link FROM bars WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $bar = $result->fetch_assoc();
        $response = [
            'status' => 'success',
            'data' => $bar,
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to fetch bar details.',
        ];
    }

    $stmt->close();
    $conn->close();
    echo json_encode($response);
}
?>
