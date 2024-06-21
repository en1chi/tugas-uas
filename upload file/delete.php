<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "p-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM file_upload WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $notification = '<div class="alert alert-success" role="alert">
                        Record deleted successfully
                    </div>';
} else {
    $notification = '<div class="alert alert-danger" role="alert">
                        Error deleting record: ' . $conn->error . '
                    </div>';
}

$conn->close();
?>

<?php require_once '../layout/_top.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php echo $notification; ?>
        <a href="index.php" class="btn btn-secondary mt-3">Back to List</a>
    </div>

    <!-- Link JS Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php require_once '../layout/_bottom.php'; ?>
