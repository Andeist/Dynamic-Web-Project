<?php
session_start();
require_once '../config/dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the comment data from the request
    $commentText = $_POST['comment_text'];
    $dessertId = $_POST['dessert_id']; 
    $drinkId = $_POST['drink_id']; 
    $userId = $_SESSION['user_id']; 

    // Prepare the SQL statement
    $query = $conn->prepare("INSERT INTO comments (dessert_id, drink_id, user_id, comment_text) VALUES (?, ?, ?, ?)");
    $query->bind_param("iiis", $dessertId, $drinkId, $userId, $commentText);

    // Execute the query
    if ($query->execute()) {
        $commentId = $query->insert_id;

        // Return the response as JSON
        $response = [
            'status' => 'success',
            'message' => 'Comment added successfully.',
            'commentId' => $commentId
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to add comment.'
        ];
    }

    echo json_encode($response);
}
?>
