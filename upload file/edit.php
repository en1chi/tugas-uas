<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$result = mysqli_query($connection, "SELECT * FROM file_upload WHERE id = $id");
$data = mysqli_fetch_assoc($result);
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Edit Document</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group">
              <label for="document_type">Document Type</label>
              <select name="document_type" id="document_type" class="form-control" required>
                <option value="Ijazah" <?= $data['document_type'] == 'Ijazah' ? 'selected' : '' ?>>Ijazah</option>
                <option value="Kartu Keluarga" <?= $data['document_type'] == 'Kartu Keluarga' ? 'selected' : '' ?>>Kartu Keluarga</option>
                <option value="KTP" <?= $data['document_type'] == 'KTP' ? 'selected' : '' ?>>KTP</option>
                <option value="Akta Kelahiran" <?= $data['document_type'] == 'Akta Kelahiran' ? 'selected' : '' ?>>Akta Kelahiran</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Document</button>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
