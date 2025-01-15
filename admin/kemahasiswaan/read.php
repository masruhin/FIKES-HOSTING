<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $nama_ukm = $_POST['nama_ukm'];
        $pembina_ukm = $_POST['pembina_ukm'];
        $periode_ukm = $_POST['periode_ukm'];
        $jenis_ukm = $_POST['jenis_ukm'];
        $logo_ukm = '';

        // Upload logo
        if (!empty($_FILES['logo_ukm']['name'])) {
            $fileName = time() . '_' . $_FILES['logo_ukm']['name']; // Rename file dengan timestamp
            $fileTmp = $_FILES['logo_ukm']['tmp_name'];
            $filePath = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmp, $filePath)) {
                $logo_ukm = $fileName;
            } else {
                echo "<script>alert('Gagal mengupload file.')</script>";
            }
        }

        // Insert ke database
        $ketua_ukm = $_POST['ketua_ukm'];
        $keterangan_ukm = $_POST['keterangan_ukm'];
        $stmt = $conn->prepare("INSERT INTO ukm (nama_ukm, pembina_ukm, periode_ukm, jenis_ukm, ketua_ukm, keterangan_ukm, logo_ukm) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss', $nama_ukm, $pembina_ukm, $periode_ukm, $jenis_ukm, $ketua_ukm, $keterangan_ukm, $logo_ukm);
    }
    // Update
    elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id_ukm = $_POST['id_ukm'];
        $nama_ukm = $_POST['nama_ukm'];
        $pembina_ukm = $_POST['pembina_ukm'];
        $periode_ukm = $_POST['periode_ukm'];
        $jenis_ukm = $_POST['jenis_ukm'];

        $ketua_ukm = $_POST['ketua_ukm'];
        $keterangan_ukm = $_POST['keterangan_ukm'];

        if (!empty($_FILES['logo_ukm']['name'])) {
            $fileName = time() . '_' . $_FILES['logo_ukm']['name']; // Rename file dengan timestamp
            $fileTmp = $_FILES['logo_ukm']['tmp_name'];
            $filePath = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmp, $filePath)) {
                $logo_ukm = $fileName;
            } else {
                echo "<script>alert('Gagal mengupload file.')</script>";
            }
            // Update with logo
            $stmt = $conn->prepare("UPDATE ukm SET nama_ukm = ?, pembina_ukm = ?, periode_ukm = ?, jenis_ukm = ?, ketua_ukm = ?, keterangan_ukm = ?, logo_ukm = ? WHERE id_ukm = ?");
            $stmt->bind_param('sssssssi', $nama_ukm, $pembina_ukm, $periode_ukm, $jenis_ukm, $ketua_ukm, $keterangan_ukm, $fileName, $id_ukm);
        } else {
            // Update without logo
            $stmt = $conn->prepare("UPDATE ukm SET nama_ukm = ?, pembina_ukm = ?, periode_ukm = ?, jenis_ukm = ?, ketua_ukm = ?, keterangan_ukm = ? WHERE id_ukm = ?");
            $stmt->bind_param('ssssssi', $nama_ukm, $pembina_ukm, $periode_ukm, $jenis_ukm, $ketua_ukm, $keterangan_ukm, $id_ukm);
        }

        $stmt->execute();
        $stmt->close();
    }
    // Delete
    elseif (isset($_POST['delete_id'])) {
        $id_ukm = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM ukm WHERE id_ukm = ?");
        $stmt->bind_param('i', $id_ukm);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_ukm, nama_ukm, logo_ukm, pembina_ukm, periode_ukm, jenis_ukm,ketua_ukm,keterangan_ukm, created_at FROM ukm";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">UKM</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama UKM</th>
                            <th>Logo</th>
                            <th>Pembina</th>
                            <th>Ketua</th>
                            <th>Periode</th>
                            <th>Jenis UKM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_ukm']) ?></td>
                                <td><img src="uploads/<?= htmlspecialchars($row['logo_ukm']) ?>" alt="Logo" style="width: 50px;"></td>
                                <td><?= htmlspecialchars($row['pembina_ukm']) ?></td>
                                <td><?= htmlspecialchars($row['ketua_ukm']) ?></td>
                                <td><?= htmlspecialchars($row['periode_ukm']) ?></td>
                                <td><?= htmlspecialchars($row['jenis_ukm']) ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id_ukm'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['nama_ukm'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['pembina_ukm'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['periode_ukm'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['jenis_ukm'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['logo_ukm'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['ketua_ukm'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['keterangan_ukm'], ENT_QUOTES) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>

                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_ukm'] ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah UKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="create">
                    <div class="form-group">
                        <label for="nama_ukm">Nama UKM</label>
                        <input type="text" name="nama_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pembina_ukm">Pembina UKM</label>
                        <input type="text" name="pembina_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="periode_ukm">Periode</label>
                        <input type="text" name="periode_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_ukm">Jenis UKM</label>
                        <select class="form-control" name="jenis_ukm" required>
                            <option value="UKM-SOFTSKILL">UKM</option>
                            <option value="HIM">BEM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ketua_ukm">Ketua UKM</label> <!-- New field -->
                        <input type="text" name="ketua_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_ukm">Keterangan UKM</label> <!-- New field -->
                        <textarea name="keterangan_ukm" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo_ukm">Upload Logo</label>
                        <input type="file" name="logo_ukm" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                <h5 class="modal-title">Edit UKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="editForm">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_ukm" id="edit_id_ukm">
                    <div class="form-group">
                        <label for="nama_ukm">Nama UKM</label>
                        <input type="text" name="nama_ukm" id="edit_nama_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pembina_ukm">Pembina UKM</label>
                        <input type="text" name="pembina_ukm" id="edit_pembina_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="periode_ukm">Periode</label>
                        <input type="text" name="periode_ukm" id="edit_periode_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_ukm">Jenis UKM</label>
                        <select class="form-control" name="jenis_ukm" id="edit_jenis_ukm" required>
                            <option value="UKM-SOFTSKILL">UKM</option>
                            <option value="HIM">BEM</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ketua_ukm">Ketua UKM</label> <!-- New field -->
                        <input type="text" name="ketua_ukm" id="edit_ketua_ukm" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_ukm">Keterangan UKM</label> <!-- New field -->
                        <textarea name="keterangan_ukm" id="edit_keterangan_ukm" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo_ukm">Upload Logo</label>
                        <input type="file" name="logo_ukm" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    function editData(id, nama, pembina, periode, jenis, ketua_ukm, keterangan) {
        document.getElementById('edit_id_ukm').value = id;
        document.getElementById('edit_nama_ukm').value = nama;
        document.getElementById('edit_pembina_ukm').value = pembina;
        document.getElementById('edit_periode_ukm').value = periode;
        document.getElementById('edit_jenis_ukm').value = jenis;
        document.getElementById('edit_ketua_ukm').value = ketua_ukm;
        document.getElementById('edit_keterangan_ukm').value = keterangan;

    }

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