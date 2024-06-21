<?php
require_once '../helper/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $document_type = $_POST['document_type'];

    $sql = "UPDATE file_upload SET document_type = '$document_type' WHERE id = $id";

    if (mysqli_query($connection, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>
