<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        // Insert data
        $caption = $_POST['caption'];
        $file_galery_photo = '';

        // Upload photo
        if (!empty($_FILES['file_galery_photo']['name'])) {
            $photoName = $_FILES['file_galery_photo']['name'];
            $photoTmp = $_FILES['file_galery_photo']['tmp_name'];
            $photoPath = 'uploads/' . basename($photoName);

            if (move_uploaded_file($photoTmp, $photoPath)) {
                $file_galery_photo = $photoName;
            } else {
                echo "Gagal mengupload foto.";
            }
        }

        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO galery_photo (caption, file_galery_photo, is_publish) VALUES (?, ?, ?)");
        $is_publish = 1; // Atau sesuai kebutuhan
        $stmt->bind_param('ssi', $caption, $file_galery_photo, $is_publish);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update data
        $id_galery_photo = $_POST['id_galery_photo'];
        $caption = $_POST['caption'];

        if (!empty($_FILES['file_galery_photo']['name'])) {
            $photoName = $_FILES['file_galery_photo']['name'];
            $photoTmp = $_FILES['file_galery_photo']['tmp_name'];
            $photoPath = 'uploads/' . basename($photoName);

            if (move_uploaded_file($photoTmp, $photoPath)) {
                $stmt = $conn->prepare("UPDATE galery_photo SET caption = ?, file_galery_photo = ? WHERE id_galery_photo = ?");
                $stmt->bind_param('ssi', $caption, $photoName, $id_galery_photo);
            }
        } else {
            $stmt = $conn->prepare("UPDATE galery_photo SET caption = ? WHERE id_galery_photo = ?");
            $stmt->bind_param('si', $caption, $id_galery_photo);
        }

        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_id'])) {
        // Hapus data
        $id_galery_photo = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM galery_photo WHERE id_galery_photo = ?");
        $stmt->bind_param('i', $id_galery_photo);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_galery_photo, caption, file_galery_photo, is_publish FROM galery_photo";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Galeri Foto</h3>
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
                                <td><?= htmlspecialchars($row['caption']) ?></td>
                                <td><img src="uploads/<?= htmlspecialchars($row['file_galery_photo']) ?>" width="50" height="50"></td>
                                <td><?= $row['is_publish'] ? 'Dipublikasikan' : 'Tidak Dipublikasikan' ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id_galery_photo'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['caption'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['file_galery_photo'], ENT_QUOTES) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>

                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_galery_photo'] ?>">
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
                        <h5 class="modal-title">Tambah Galeri Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="file_galery_photo">Upload Photo</label>
                                <input type="file" name="file_galery_photo" class="form-control" accept="image/*" required>
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
                        <h5 class="modal-title">Edit Galeri Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_galery_photo" id="edit_id_galery_photo">
                            <div class="form-group">
                                <label for="edit_caption">Caption</label>
                                <input type="text" name="caption" class="form-control" id="edit_caption" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_file_galery_photo">Upload Photo (jika ingin mengganti)</label>
                                <input type="file" name="file_galery_photo" class="form-control" accept="image/*">
                                <small>Biarkan kosong jika tidak ingin mengganti foto.</small>
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
    function editData(id, caption, file_galery_photo) {
        document.getElementById('edit_id_galery_photo').value = id;
        document.getElementById('edit_caption').value = caption;
        console.log(id);
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