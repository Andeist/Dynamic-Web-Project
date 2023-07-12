<?php
include('../../config/dbconn.php');

// Retrieve form data
$name = $_POST['name'];
$location = $_POST['gmaps_location'];
$webLink = $_POST['webLink'];

$uploadDirectory = '../../frontend/images/bars/';
$filename = $_FILES['image']['name'];
$uploadFile = $uploadDirectory . basename($filename);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {

    $query = 'INSERT INTO bars (name, image, gmaps_location, web_link) VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($query);
    $imagePath = 'images/bars/' . $filename; 
    $stmt->bind_param('ssss', $name, $imagePath, $location, $webLink);
    $stmt->execute();

    $response = [
        'status' => 'success',
        'title' => 'Success',
        'message' => 'New bar added successfully.',
    ];
} else {
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
