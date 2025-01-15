<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        // Insert data
        $jenis_prestasi = $_POST['jenis_prestasi'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $keterangan_satu = $_POST['keterangan_satu'];
        $keterangan_dua = $_POST['keterangan_dua'];
        $waktu_perolehan = $_POST['waktu_perolehan'];
        $photo = '';

        // Upload photo
        if (!empty($_FILES['photo_prestasi']['name'])) {
            $photoName = $_FILES['photo_prestasi']['name'];
            $photoTmp = $_FILES['photo_prestasi']['tmp_name'];
            $photoPath = 'uploads/' . basename($photoName);

            if (move_uploaded_file($photoTmp, $photoPath)) {
                $photo = $photoName;
            } else {
                echo "Gagal mengupload foto.";
            }
        }

        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO prestasi (jenis_prestasi, nama_mahasiswa, keterangan_satu, keterangan_dua, waktu_perolehan, photo_prestasi) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $jenis_prestasi, $nama_mahasiswa, $keterangan_satu, $keterangan_dua, $waktu_perolehan, $photo);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update data
        $id_prestasi = $_POST['id_prestasi'];
        $jenis_prestasi = $_POST['jenis_prestasi'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $keterangan_satu = $_POST['keterangan_satu'];
        $keterangan_dua = $_POST['keterangan_dua'];
        $waktu_perolehan = $_POST['waktu_perolehan'];

        if (!empty($_FILES['photo_prestasi']['name'])) {
            $photoName = $_FILES['photo_prestasi']['name'];
            $photoTmp = $_FILES['photo_prestasi']['tmp_name'];
            $photoPath = 'uploads/' . basename($photoName);

            if (move_uploaded_file($photoTmp, $photoPath)) {
                $photo = $photoName;
                $stmt = $conn->prepare("UPDATE prestasi SET jenis_prestasi = ?, nama_mahasiswa = ?, keterangan_satu = ?, keterangan_dua = ?, waktu_perolehan = ?, photo_prestasi = ? WHERE id_prestasi = ?");
                $stmt->bind_param('ssssssi', $jenis_prestasi, $nama_mahasiswa, $keterangan_satu, $keterangan_dua, $waktu_perolehan, $photo, $id_prestasi);
            }
        } else {
            $stmt = $conn->prepare("UPDATE prestasi SET jenis_prestasi = ?, nama_mahasiswa = ?, keterangan_satu = ?, keterangan_dua = ?, waktu_perolehan = ? WHERE id_prestasi = ?");
            $stmt->bind_param('sssss', $jenis_prestasi, $nama_mahasiswa, $keterangan_satu, $keterangan_dua, $waktu_perolehan, $id_prestasi);
        }

        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_id'])) {
        // Hapus data
        $id_prestasi = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM prestasi WHERE id_prestasi = ?");
        $stmt->bind_param('i', $id_prestasi);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_prestasi, jenis_prestasi, nama_mahasiswa, keterangan_satu, keterangan_dua, waktu_perolehan, photo_prestasi FROM prestasi";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Prestasi Mahasiswa</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Prestasi</th>
                            <th>Nama Mahasiswa</th>
                            <th>Keterangan</th>
                            <th>Waktu Perolehan</th>
                            <th>Photo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['jenis_prestasi']) ?></td>
                                <td><?= htmlspecialchars($row['nama_mahasiswa']) ?></td>
                                <td><?= substr(htmlspecialchars($row['keterangan_dua']), 0, 40) ?>...</td>
                                <td><?= htmlspecialchars($row['waktu_perolehan']) ?></td>
                                <td><img src="uploads/<?= htmlspecialchars($row['photo_prestasi']) ?>" width="50" height="50"></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?php echo htmlspecialchars($row['id_prestasi'], ENT_QUOTES); ?>', 
                       '<?php echo htmlspecialchars($row['jenis_prestasi'], ENT_QUOTES); ?>', 
                       '<?php echo htmlspecialchars($row['nama_mahasiswa'], ENT_QUOTES); ?>', 
                       '<?php echo htmlspecialchars($row['keterangan_satu'], ENT_QUOTES); ?>', 
                       '<?php echo htmlspecialchars($row['keterangan_dua'], ENT_QUOTES); ?>', 
                       '<?php echo htmlspecialchars($row['waktu_perolehan'], ENT_QUOTES); ?>', 
                       '<?php echo htmlspecialchars($row['photo_prestasi'], ENT_QUOTES); ?>')"
                                        data-toggle="modal"
                                        data-target="#EditModal">Edit</button>
                                        


                                    

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Prestasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="action" value="update">
                                                        <input type="hidden" name="id_prestasi" id="edit_id_prestasi">
                                                        <div class="form-group">
                                                            <label for="edit_jenis_prestasi">Jenis Prestasi</label>
                                                            <input type="text" name="jenis_prestasi" class="form-control" id="edit_jenis_prestasi" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_nama_mahasiswa">Nama Mahasiswa</label>
                                                            <input type="text" name="nama_mahasiswa" class="form-control" id="edit_nama_mahasiswa" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_keterangan_satu">Keterangan Satu</label>
                                                            <textarea name="keterangan_satu" class="form-control" id="edit_keterangan_satu" rows="6"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_keterangan_dua">Keterangan Dua</label>
                                                            <textarea name="keterangan_dua" class="form-control" id="edit_keterangan_dua" rows="6"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_waktu_perolehan">Waktu Perolehan</label>
                                                            <input type="date" name="waktu_perolehan" class="form-control" id="edit_waktu_perolehan" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_photo_prestasi">Upload Photo (jika ingin mengganti)</label>
                                                            <input type="file" name="photo_prestasi" class="form-control" accept="image/*">
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
                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_prestasi'] ?>">
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
                        <h5 class="modal-title">Tambah Prestasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="jenis_prestasi">Jenis Prestasi</label>
                                <input type="text" name="jenis_prestasi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" name="nama_mahasiswa" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_satu">Keterangan Satu</label>
                                <textarea name="keterangan_satu" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_dua">Keterangan Dua</label>
                                <textarea name="keterangan_dua" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="waktu_perolehan">Waktu Perolehan</label>
                                <input type="date" name="waktu_perolehan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="photo_prestasi">Upload Photo</label>
                                <input type="file" name="photo_prestasi" class="form-control" accept="image/*" required>
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
    function editData(id, jenis_prestasi, nama_mahasiswa, keterangan_satu, keterangan_dua, waktu_perolehan, photo_prestasi) {
        // const naama = nama_mahasiswa;
        document.getElementById('edit_id_prestasi').value = id;
        document.getElementById('edit_jenis_prestasi').value = jenis_prestasi;
        document.getElementById('edit_nama_mahasiswa').value = nama_mahasiswa;
        document.getElementById('edit_keterangan_satu').value = keterangan_satu;
        document.getElementById('edit_keterangan_dua').value = keterangan_dua;
        document.getElementById('edit_waktu_perolehan').value = waktu_perolehan;
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