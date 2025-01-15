<?php
include '../conn.php'; // Koneksi database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_dosen = isset($_POST['id_dosen']) ? $_POST['id_dosen'] : '';
    $fullname_dosen = isset($_POST['fullname_dosen']) ? $_POST['fullname_dosen'] : '';
    $prodi_dosen = isset($_POST['prodi_dosen']) ? $_POST['prodi_dosen'] : '';

    // Untuk menghapus data dosen
    if (isset($_POST['delete'])) {
        $stmt = $conn->prepare("DELETE FROM dosen WHERE id_dosen = ?");
        $stmt->bind_param("i", $id_dosen);
        if ($stmt->execute()) {
            echo "<script>alert('Data dosen berhasil dihapus!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        // Upload Foto Dosen
        if (isset($_FILES['foto_dosen']) && $_FILES['foto_dosen']['error'] == UPLOAD_ERR_OK) {
            $foto_tmp = $_FILES['foto_dosen']['tmp_name'];
            $foto_name = $_FILES['foto_dosen']['name'];

            // Rename otomatis dengan waktu saat ini
            $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
            $new_foto_name = 'foto_' . time() . '.' . $foto_ext;
            $foto_destination = 'uploads/foto_dosen/' . $new_foto_name;

            // Pindahkan file ke folder tujuan
            move_uploaded_file($foto_tmp, $foto_destination);
        } else {
            $new_foto_name = ''; // Kosongkan jika tidak ada upload
        }

        if ($id_dosen == '') {
            // Insert data dosen baru
            $stmt = $conn->prepare("INSERT INTO dosen (fullname_dosen, prodi_dosen, foto_dosen) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fullname_dosen, $prodi_dosen, $new_foto_name);
        } else {
            // Update data dosen
            if ($new_foto_name != '') {
                // Jika ada foto baru, update dengan foto
                $stmt = $conn->prepare("UPDATE dosen SET fullname_dosen = ?, prodi_dosen = ?, foto_dosen = ? WHERE id_dosen = ?");
                $stmt->bind_param("sssi", $fullname_dosen, $prodi_dosen, $new_foto_name, $id_dosen);
            } else {
                // Jika tidak ada foto baru, update tanpa foto
                $stmt = $conn->prepare("UPDATE dosen SET fullname_dosen = ?, prodi_dosen = ? WHERE id_dosen = ?");
                $stmt->bind_param("ssi", $fullname_dosen, $prodi_dosen, $id_dosen);
            }
        }

        // Eksekusi query dan berikan feedback
        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil disimpan!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

// Menampilkan semua data dosen
$sql = "SELECT id_dosen, fullname_dosen, foto_dosen, prodi_dosen FROM dosen";
$result = $conn->query($sql);
?>

<!-- Form Tambah/Edit Dosen -->
<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Data Dosen</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                Tambah Dosen
            </button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">

                <table id="example2" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">

                    <thead style="text-align: center;">
                        <tr>
                            <th>#</th>
                            <th>Nama Dosen</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['fullname_dosen']; ?></td>
                                <td><?php echo $row['prodi_dosen']; ?></td>

                                <td>
                                    <!-- Edit -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal<?php echo $row['id_dosen']; ?>">
                                        Edit
                                    </button>
                                    <!-- Hapus dengan POST -->
                                    <form action="" method="POST" style="display:inline;">
                                        <input type="hidden" name="id_dosen" value="<?php echo $row['id_dosen']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="EditModal<?php echo $row['id_dosen']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Dosen</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id_dosen" value="<?php echo $row['id_dosen']; ?>">
                                                <div class="form-group">
                                                    <label for="fullname_dosen">Nama Dosen</label>
                                                    <input type="text" class="form-control" name="fullname_dosen" value="<?php echo $row['fullname_dosen']; ?>" required>
                                                </div>
                                                <!-- Upload Foto Dosen -->
                                                <div class="form-group">
                                                    <label for="foto_dosen">Upload Foto Dosen</label>
                                                    <input type="file" class="form-control" name="foto_dosen" accept="image/*">
                                                    <!-- Menampilkan foto lama -->
                                                    <img src="<?= $base_url ?>/admin/uploads/foto_dosen/<?php echo $row['foto_dosen']; ?>" alt="Foto Dosen" width="100">
                                                </div>
                                                <div class="form-group">
                                                    <label for="prodi_dosen">Program Studi</label>
                                                    <select class="form-control" name="prodi_dosen" required>
                                                        <option value="D3 KEPERAWATAN" <?php echo ($row['prodi_dosen'] == 'D3 KEPERAWATAN') ? 'selected' : ''; ?>>PRODI D III KEPERAWATAN</option>
                                                        <option value="D3 KEBIDANAN" <?php echo ($row['prodi_dosen'] == 'D3 KEBIDANAN') ? 'selected' : ''; ?>>PRODI D III KEBIDANAN</option>
                                                        <option value="S1 ILMU KEPERAWATAN" <?php echo ($row['prodi_dosen'] == 'S1 ILMU KEPERAWATAN') ? 'selected' : ''; ?>>PRODI ILMU KEPERAWATAN DAN NERS</option>
                                                        <option value="S1 FARMASI" <?php echo ($row['prodi_dosen'] == 'S1 FARMASI') ? 'selected' : ''; ?>>PRODI S1 FARMASI</option>
                                                        <option value="K3" <?php echo ($row['prodi_dosen'] == 'K3') ? 'selected' : ''; ?>>PRODI D IV KESELAMATAN DAN KESEHATAN KERJA (K3)</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Dosen -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname_dosen">Nama Dosen</label>
                        <input type="text" class="form-control" name="fullname_dosen" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_dosen">Upload Foto Dosen</label>
                        <input type="file" class="form-control" name="foto_dosen" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="prodi_dosen">Program Studi</label>
                        <select class="form-control" name="prodi_dosen" required>
                            <option value="PRODI D III KEPERAWATAN">PRODI D III KEPERAWATAN</option>
                            <option value="PRODI D III KEBIDANAN">PRODI D III KEBIDANAN</option>
                            <option value="PRODI ILMU KEPERAWATAN DAN NERS">PRODI ILMU KEPERAWATAN DAN NERS</option>
                            <option value="PRODI S1 FARMASI">PRODI S1 FARMASI</option>
                            <option value="PRODI D IV KESELAMATAN DAN KESEHATAN KERJA (K3)">PRODI D IV KESELAMATAN DAN KESEHATAN KERJA (K3)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Dosen</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        $('#example2').dataTable({
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