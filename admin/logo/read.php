<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        // Insert data
        $caption_logo = $_POST['caption_logo'];
        $file_logo = '';

        // Upload logo
        if (!empty($_FILES['file_logo']['name'])) {
            $logoName = $_FILES['file_logo']['name'];
            $logoTmp = $_FILES['file_logo']['tmp_name'];
            $logoPath = 'uploads/' . basename($logoName);

            if (move_uploaded_file($logoTmp, $logoPath)) {
                $file_logo = $logoName;
            } else {
                echo "Gagal mengupload logo.";
            }
        }

        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO logo (caption_logo, file_logo, is_publish) VALUES (?, ?, ?)");
        $is_publish = 1; // Atur nilai default atau sesuai kebutuhan
        $stmt->bind_param('ssi', $caption_logo, $file_logo, $is_publish);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update data
        $id_logo = $_POST['id_logo'];
        $caption_logo = $_POST['caption_logo'];

        if (!empty($_FILES['file_logo']['name'])) {
            $logoName = $_FILES['file_logo']['name'];
            $logoTmp = $_FILES['file_logo']['tmp_name'];
            $logoPath = 'uploads/' . basename($logoName);

            if (move_uploaded_file($logoTmp, $logoPath)) {
                $stmt = $conn->prepare("UPDATE logo SET caption_logo = ?, file_logo = ? WHERE id_logo = ?");
                $stmt->bind_param('ssi', $caption_logo, $logoName, $id_logo);
            }
        } else {
            $stmt = $conn->prepare("UPDATE logo SET caption_logo = ? WHERE id_logo = ?");
            $stmt->bind_param('si', $caption_logo, $id_logo);
        }

        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_id'])) {
        // Hapus data
        $id_logo = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM logo WHERE id_logo = ?");
        $stmt->bind_param('i', $id_logo);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_logo, caption_logo, file_logo, is_publish FROM logo";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Logo</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Caption</th>
                            <th>File</th>
                            <th>Status Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['caption_logo']) ?></td>
                                <td><img src="uploads/<?= htmlspecialchars($row['file_logo']) ?>" width="50" height="50"></td>
                                <td><?= $row['is_publish'] ? 'Dipublikasikan' : 'Tidak Dipublikasikan' ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id_logo'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['caption_logo'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['file_logo'], ENT_QUOTES) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>

                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_logo'] ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="caption_logo">Caption</label>
                                <input type="text" name="caption_logo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="file_logo">Upload Logo</label>
                                <input type="file" name="file_logo" class="form-control" accept="image/*" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_logo" id="edit_id_logo">
                            <div class="form-group">
                                <label for="edit_caption_logo">Caption</label>
                                <input type="text" name="caption_logo" class="form-control" id="edit_caption_logo" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_file_logo">Upload Logo (jika ingin mengganti)</label>
                                <input type="file" name="file_logo" class="form-control" accept="image/*">
                                <small>Biarkan kosong jika tidak ingin mengganti logo.</small>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function editData(id, caption_logo, file_logo) {
        document.getElementById('edit_id_logo').value = id;
        document.getElementById('edit_caption_logo').value = caption_logo;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        $('#example1').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "processing": true,
            "language": {
                "emptyTable": "Tidak ada data yang ditemukan"
            }
        });
    });
</script>