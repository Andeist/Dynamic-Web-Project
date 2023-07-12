<?php
include('../../config/dbconn.php');

// Retrieve form data
$id = $_POST['id'];
$name = $_POST['name'];
$image = $_FILES['image']['name'];
$gmapsLocation = $_POST['gmapsLocation'];
$webLink = $_POST['webLink'];

// Check if a new image file is uploaded
if (!empty($_FILES['image']['tmp_name'])) {
    // File upload path and directory
    $uploadDirectory = '../../frontend/images/bars/';
    $filename = $_FILES['image']['name'];
    $uploadFile = $uploadDirectory . basename($filename);

    // Move uploaded file to the desired directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // File uploaded successfully, update the database record with the new image path
        $imagePath = 'images/bars/' . $filename; 

        // Prepare and execute the database query
        $query = 'UPDATE bars SET name = ?, image = ?, gmaps_location = ?, web_link = ? WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $name, $imagePath, $gmapsLocation, $webLink, $id);
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
    $query = 'UPDATE bars SET name = ?, gmaps_location = ?, web_link = ? WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $name, $gmapsLocation, $webLink, $id);
    $stmt->execute();
}

// Prepare the response
$response = [
    'status' => 'success',
    'title' => 'Success',
    'message' => 'Bar updated successfully.',
];

$stmt->close();
$conn->close();
echo json_encode($response);
?>
