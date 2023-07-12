<?php
include('../../config/dbconn.php');

$name = $_POST['name'];
$location = $_POST['location'];
$webLink = $_POST['webLink'];

// File upload path and directory
$uploadDirectory = '../../frontend/images/bars/';
$filename = $_FILES['image']['name'];
$uploadFile = $uploadDirectory . basename($filename);

// Move uploaded file to the desired directory
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
    // File uploaded successfully, proceed to store file path in the database

    // Prepare and execute the database query
    $query = 'INSERT INTO bars (name, image, gmaps_location, web_link) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($query);
    $imagePath = 'images/bars/' . $filename; 
    $stmt->bind_param('ssss', $name, $imagePath, $location, $webLink);
    $stmt->execute();

    // Prepare the response
    $response = [
        'status' => 'success',
        'title' => 'Success',
        'message' => 'New bar added successfully.',
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
