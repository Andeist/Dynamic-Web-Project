<?php
include('../../config/dbconn.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM desserts WHERE id='$id'";

    if ($conn->query($sql)) {
        $response['status'] = 'success';
        $response['message'] = 'Dessert deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete dessert.';
    }

    echo json_encode($response);
}
?>
