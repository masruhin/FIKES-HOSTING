<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $judul_akademik = $_POST['judul_akademik'];
        $file_akademik = '';
        $keterangan_akademik = $_POST['keterangan_akademik'];
        $type_akademik = $_POST['type_akademik'];

        // Upload file
        if (!empty($_FILES['file_akademik']['name'])) {
            $fileName = $_FILES['file_akademik']['name'];
            $fileTmp = $_FILES['file_akademik']['tmp_name'];
            $filePath = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmp, $filePath)) {
                $file_akademik = $fileName;
            } else {
                echo "Gagal mengupload file.";
            }
        }

        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO akademik (judul_akademik, file_akademik, keterangan_akademik, type_akademik, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param('ssss', $judul_akademik, $file_akademik, $keterangan_akademik, $type_akademik);
        $stmt->execute();
        $stmt->close();
    }
    // Update
    elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id_akademik = $_POST['id_akademik'];
        $judul_akademik = $_POST['judul_akademik'];
        $keterangan_akademik = $_POST['keterangan_akademik'];
        $type_akademik = $_POST['type_akademik'];

        if (!empty($_FILES['file_akademik']['name'])) {
            $fileName = $_FILES['file_akademik']['name'];
            $fileTmp = $_FILES['file_akademik']['tmp_name'];
            $filePath = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmp, $filePath)) {
                $stmt = $conn->prepare("UPDATE akademik SET judul_akademik = ?, file_akademik = ?, keterangan_akademik = ?, type_akademik = ? WHERE id_akademik = ?");
                $stmt->bind_param('ssssi', $judul_akademik, $fileName, $keterangan_akademik, $type_akademik, $id_akademik);
            }
        } else {
            $stmt = $conn->prepare("UPDATE akademik SET judul_akademik = ?, keterangan_akademik = ?, type_akademik = ? WHERE id_akademik = ?");
            $stmt->bind_param('sssi', $judul_akademik, $keterangan_akademik, $type_akademik, $id_akademik);
        }

        $stmt->execute();
        $stmt->close();
    }
    // Delete
    elseif (isset($_POST['delete_id'])) {
        $id_akademik = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM akademik WHERE id_akademik = ?");
        $stmt->bind_param('i', $id_akademik);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_akademik, judul_akademik, file_akademik, keterangan_akademik, type_akademik FROM akademik";
$result = $conn->query($sql);

// Periksa kesalahan query
if (!$result) {
    die("Error executing query: " . $conn->error);
}

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Akademik</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Akademik</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['judul_akademik']) ?></td>
                                <td><a href="uploads/<?= htmlspecialchars($row['file_akademik']) ?>" target="_blank">Download</a></td>
                                <td><?= htmlspecialchars($row['keterangan_akademik']) ?></td>
                                <td><?= htmlspecialchars($row['type_akademik']) ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id_akademik'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['judul_akademik'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['keterangan_akademik'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['file_akademik'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['type_akademik'], ENT_QUOTES) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>

                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_akademik'] ?>">
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
                        <h5 class="modal-title">Tambah Akademik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="judul_akademik">Judul Akademik</label>
                                <input type="text" name="judul_akademik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="file_akademik">Upload File</label>
                                <input type="file" name="file_akademik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_akademik">Keterangan</label>
                                <textarea name="keterangan_akademik" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="type_akademik">Tipe Akademik</label>
                                <select name="type_akademik" class="form-control" aria-label="Default select example" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Kalender Akademik">Kalender Akademik</option>
                                    <option value="Denah Ruang Kuliah">Denah Ruang Kuliah</option>
                                    <option value="Jadwal Perkuliahan">Jadwal Perkuliahan</option>
                                </select>
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

        <!-- Modal Edit -->
        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Akademik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_akademik" id="edit-id_akademik">
                            <div class="form-group">
                                <label for="edit_judul_akademik">Judul Akademik</label>
                                <input type="text" name="judul_akademik" id="edit_judul_akademik" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_file_akademik">Upload File (Kosongkan jika tidak ingin mengganti)</label>
                                <input type="file" name="file_akademik" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edit_keterangan_akademik">Keterangan</label>
                                <textarea name="keterangan_akademik" id="edit_keterangan_akademik" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit_type_akademik">Tipe Akademik</label>
                                <select name="type_akademik" id="edit_type_akademik" class="form-control" aria-label="Default select example" required>
                                    <option value="Kalender Akademik">Kalender Akademik</option>
                                    <option value="Denah Ruang Kuliah">Denah Ruang Kuliah</option>
                                    <option value="Jadwal Perkuliahan">Jadwal Perkuliahan</option>
                                </select>
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
    function editData(id, judul, keterangan, file, type) {
        document.getElementById('edit-id_akademik').value = id;
        document.getElementById('edit_judul_akademik').value = judul;
        document.getElementById('edit_keterangan_akademik').value = keterangan;
        document.getElementById('edit_type_akademik').value = type;
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>