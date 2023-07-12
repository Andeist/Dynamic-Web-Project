<?php
include('../../config/dbconn.php');

// Retrieve form data
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];
$videoEmbed = $_POST['videoEmbed'];

// Check if a new image file is uploaded
if (!empty($_FILES['image']['tmp_name'])) {
    // File upload path and directory
    $uploadDirectory = '../../frontend/images/drinks/';
    $filename = $_FILES['image']['name'];
    $uploadFile = $uploadDirectory . basename($filename);

    // Move uploaded file to the desired directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // File uploaded successfully, update the database record with the new image path
        $imagePath = 'images/drinks/' . $filename;

        // Prepare and execute the database query
        $query = 'UPDATE drinks SET name = ?, description = ?, image = ?, ingredients = ?, directions = ?, video_embed = ? WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssi', $name, $description, $imagePath, $ingredients, $directions, $videoEmbed, $id);
        $stmt->execute();
    } else {
        // Failed to move uploaded file
        $response = [
            'status' => 'error',
            'title' => 'Error',
            'message' => 'Failed to upload the file.',
        ];

        $stmt->close();
        $conn->close();
        echo json_encode($response);
        exit;
    }
} else {
    // No new image file uploaded, update the other fields without modifying the image

    // Prepare and execute the database query
    $query = 'UPDATE drinks SET name = ?, description = ?, ingredients = ?, directions = ?, video_embed = ? WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssi', $name, $description, $ingredients, $directions, $videoEmbed, $id);
    $stmt->execute();
}

$response = [
    'status' => 'success',
    'title' => 'Success',
    'message' => 'Drink updated successfully.',
];

$stmt->close();
$conn->close();
echo json_encode($response);
?>
