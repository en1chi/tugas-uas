<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// Mengambil data file yang diupload
$files = mysqli_query($connection, "SELECT * FROM file_upload");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar File yang Diunggah</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 900px;
            margin-top: 50px;
        }
        .table thead th {
            background-color: #6777ef;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Daftar File yang Diunggah</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis Dokumen</th>
                        <th>Nama File</th>
                        <th>Path File</th>
                        <th>Waktu Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($files) > 0) {
                        while($row = mysqli_fetch_assoc($files)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["jenis_dokumen"] . "</td>";
                            echo "<td>" . $row["nama_file"] . "</td>";
                            echo "<td><a href='" . $row["path_file"] . "' target='_blank'>Download</a></td>";
                            echo "<td>" . $row["waktu_upload"] . "</td>";
                            echo "<td><a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada file yang diupload.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Link JS Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once '../layout/_bottom.php';
?>
