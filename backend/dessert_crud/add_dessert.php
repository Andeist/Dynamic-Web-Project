<?php
include('../../config/dbconn.php');

$name = $_POST['name'];
$description = $_POST['description'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];
$videoEmbed = $_POST['videoEmbed'];

// File upload path and directory
$uploadDirectory = '../../frontend/images/desserts/';
$filename = $_FILES['image']['name'];
$uploadFile = $uploadDirectory . basename($filename);

// Move uploaded file to the desired directory
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
    // File uploaded successfully, proceed to store file path in the database

    // Prepare and execute the database query
    $query = 'INSERT INTO desserts (name, description, image, ingredients, directions, video_embed) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($query);
    $imagePath = 'images/desserts/' . $filename; 
    $stmt->bind_param('ssssss', $name, $description, $imagePath, $ingredients, $directions, $videoEmbed);
    $stmt->execute();

    // Prepare the response
    $response = [
        'status' => 'success',
        'title' => 'Success',
        'message' => 'New dessert added successfully.',
    ];
} else {
    // Failed to move uploaded file
    $response = [
        'status' => 'error',
        'title' => 'Error',
        'message' => 'Failed to upload the file.',
    ];
}

$stmt->close();
$conn->close();
echo json_encode($response);
?>
