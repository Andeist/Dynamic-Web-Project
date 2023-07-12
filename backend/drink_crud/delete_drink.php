<?php

include('../../config/dbconn.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM drinks WHERE id='$id'";

    if ($conn->query($sql)) {
        $response['status'] = 'success';
        $response['message'] = 'Drink deleted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to delete drink.';
    }

    echo json_encode($response);
}
