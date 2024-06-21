<?php
require_once '../layout/_top.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #6777ef;
            border-color: #6777ef;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Upload Document</h2>
        <form action="store.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="jenis_dokumen">Document Type</label>
                <select name="jenis_dokumen" id="jenis_dokumen" class="form-control">
                    <option value="">Select Document Type</option>
                    <option value="Ijazah">Ijazah</option>
                    <option value="Kartu Keluarga">Kartu Keluarga</option>
                    <option value="Akta Kelahiran">Akta Kelahiran</option>
                    <option value="Berkas Pendukung Lainnya">Berkas Pendukung Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="file_upload">Select file to upload</label>
                <input type="file" name="file_upload" id="file_upload" class="form-control-file">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Upload File</button>
        </form>
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
