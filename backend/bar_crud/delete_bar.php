<?php
include('../../config/dbconn.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM bars WHERE id='$id'";

    if ($conn->query($sql)) {
        $response['status'] = 'success';
        $response['message'] = 'Bar deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete bar.';
    }

    echo json_encode($response);
}
?>
