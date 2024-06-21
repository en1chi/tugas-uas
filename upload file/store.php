<?php
require_once '../layout/_top.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Upload</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "p-db";

        // Membuat koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        if (isset($_POST['submit'])) {
            $jenis_dokumen = $_POST['jenis_dokumen'];
            $file_name = $_FILES['file_upload']['name'];
            $file_tmp = $_FILES['file_upload']['tmp_name'];
            $file_path = "../data/uploads/" . $file_name;

            // Cek apakah folder uploads ada, jika tidak buat foldernya
            if (!is_dir('../data/uploads')) {
                mkdir('../data/uploads', 0777, true);
            }

            // Memindahkan file yang diupload ke folder "uploads"
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Menyimpan informasi file ke database
                $sql = "INSERT INTO file_upload (jenis_dokumen, nama_file, path_file) VALUES ('$jenis_dokumen', '$file_name', '$file_path')";
                
                if ($conn->query($sql) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">
                            File berhasil diupload.
                          </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                            Error: ' . $sql . '<br>' . $conn->error . '
                          </div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        Gagal mengupload file.
                      </div>';
            }
        }

        $conn->close();
        ?>
        <a href="create.php" class="btn btn-primary mt-3">Upload File Lain</a>
        <a href="index.php" class="btn btn-secondary mt-3">Lihat Daftar File</a>
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
