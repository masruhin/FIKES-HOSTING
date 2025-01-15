<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $kaprodi_fullname = htmlspecialchars($_POST['kaprodi_fullname']);
    $sekprodi_fullname = htmlspecialchars($_POST['sekprodi_fullname']);
    $lokasi_ps = htmlspecialchars($_POST['lokasi_ps']);
    $kontak_ps = htmlspecialchars($_POST['kontak_ps']);
    $vmts_ps = htmlspecialchars($_POST['vmts_ps']);
    $bid_peminatan_ps = htmlspecialchars($_POST['bid_peminatan_ps']);
    $lulusan_ps = htmlspecialchars($_POST['lulusan_ps']);
    $capaian_pembelajaran = htmlspecialchars($_POST['capaian_pembelajaran']);
    $is_publish = $_POST['is_publish'] ? 1 : 0; // Ensure boolean value
    $is_prodi = htmlspecialchars($_POST['is_prodi']);

    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO program_studi (kaprodi_fullname, sekprodi_fullname, lokasi_ps, kontak_ps, vmts_ps, bid_peminatan_ps, lulusan_ps, capaian_pembelajaran, is_publish, is_prodi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssssssss', $kaprodi_fullname, $sekprodi_fullname, $lokasi_ps, $kontak_ps, $vmts_ps, $bid_peminatan_ps, $lulusan_ps, $capaian_pembelajaran, $is_publish, $is_prodi);
        $stmt->execute();
        $stmt->close();
        // Add a success message
        $message = "Data successfully added!";
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update data
        $id_ps = $_POST['id_ps'];

        $stmt = $conn->prepare("UPDATE program_studi SET kaprodi_fullname = ?, sekprodi_fullname = ?, lokasi_ps = ?, kontak_ps = ?, vmts_ps = ?, bid_peminatan_ps = ?, lulusan_ps = ?, capaian_pembelajaran = ?, is_publish = ?, is_prodi = ? WHERE id_ps = ?");
        $stmt->bind_param('ssssssssssi', $kaprodi_fullname, $sekprodi_fullname, $lokasi_ps, $kontak_ps, $vmts_ps, $bid_peminatan_ps, $lulusan_ps, $capaian_pembelajaran, $is_publish, $is_prodi, $id_ps);
        $stmt->execute();
        $stmt->close();
        // Add a success message
        $message = "Data successfully updated!";
    } elseif (isset($_POST['delete_id'])) {
        // Hapus data
        $id_ps = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM program_studi WHERE id_ps = ?");
        $stmt->bind_param('i', $id_ps);
        $stmt->execute();
        $stmt->close();
        // Add a success message
        $message = "Data successfully deleted!";
        echo "<script>location.replace(location.href);</script>";
    }
}

// Ambil data dari database
$sql = "SELECT id_ps, kaprodi_fullname, sekprodi_fullname,is_prodi, lokasi_ps, kontak_ps, vmts_ps, bid_peminatan_ps, lulusan_ps, capaian_pembelajaran, is_publish FROM program_studi";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Program Studi</h3>
        </div>
        <div class="box-body">
            <!-- Tombol Tambah Data -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kaprodi</th>
                            <th>Nama Sekprodi</th>
                            <th>Lokasi</th>
                            <th>Kontak</th>
                            <!-- <th>VMTS</th> -->
                            <th>Bidang Peminatan</th>
                            <th>Lulusan</th>
                            <th>Program Studi</th>
                            <th>Capaian Pembelajaran</th>
                            <th>Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['kaprodi_fullname']) ?></td>
                                <td><?= htmlspecialchars($row['sekprodi_fullname']) ?></td>
                                <td><?= htmlspecialchars($row['lokasi_ps']) ?></td>
                                <td><?= htmlspecialchars($row['kontak_ps']) ?></td>
                                <!-- <td><?= htmlspecialchars($row['vmts_ps']) ?></td> -->
                                <td><?= htmlspecialchars($row['bid_peminatan_ps']) ?></td>
                                <td><?= htmlspecialchars($row['lulusan_ps']) ?></td>
                                <td><?= htmlspecialchars($row['is_prodi']) ?></td>
                                <td><?= htmlspecialchars($row['capaian_pembelajaran']) ?></td>
                                <td><?= $row['is_publish'] ? 'Dipublikasikan' : 'Tidak Dipublikasikan' ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= $row['id_ps'] ?>', '<?= addslashes($row['kaprodi_fullname']) ?>', 
                                                          '<?= addslashes($row['sekprodi_fullname']) ?>', '<?= addslashes($row['lokasi_ps']) ?>', 
                                                          '<?= addslashes($row['kontak_ps']) ?>', '<?= addslashes(md5($row['vmts_ps'])) ?>', 
                                                          '<?= addslashes($row['bid_peminatan_ps']) ?>', '<?= addslashes($row['lulusan_ps']) ?>', 
                                                          '<?= addslashes($row['capaian_pembelajaran']) ?>', '<?= addslashes($row['is_publish']) ?>', '<?= addslashes($row['is_prodi']) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>
                                    <!-- Tombol Hapus -->
                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_ps'] ?>">
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
                        <h5 class="modal-title">Tambah Program Studi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="kaprodi_fullname">Nama Kaprodi</label>
                                <input type="text" name="kaprodi_fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="sekprodi_fullname">Nama Sekprodi</label>
                                <input type="text" name="sekprodi_fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi_ps">Lokasi</label>
                                <input type="text" name="lokasi_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kontak_ps">Kontak</label>
                                <input type="text" name="kontak_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="vmts_ps">VMTS</label>
                                <textarea id="edit_vmts_ps" name="vmts_ps" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="bid_peminatan_ps">Bidang Peminatan</label>
                                <input type="text" name="bid_peminatan_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lulusan_ps">Lulusan</label>
                                <input type="text" name="lulusan_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="is_prodi">Program Studi</label>
                                <select name="is_prodi" class="form-control" required>
                                    <option value="Profesi Ners">Profesi Ners</option>
                                    <option value="Ilmu Keperawatan">Ilmu Keperawatan</option>
                                    <option value="Farmasi">Farmasi</option>
                                    <option value="Diploma Keperawatan">Diploma Keperawatan</option>
                                    <option value="Kebidanan">Kebidanan</option>
                                    <option value="Keselamatan dan Kesehatan Kerja">Keselamatan dan Kesehatan Kerja</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="capaian_pembelajaran">Capaian Pembelajaran</label>
                                <input type="text" name="capaian_pembelajaran" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="is_publish">Status Publikasi</label>
                                <select name="is_publish" class="form-control">
                                    <option value="1">Dipublikasikan</option>
                                    <option value="0">Tidak Dipublikasikan</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
                        <h5 class="modal-title">Edit Program Studi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" id="edit_id_ps" name="id_ps">
                            <div class="form-group">
                                <label for="kaprodi_fullname">Nama Kaprodi</label>
                                <input type="text" id="edit_kaprodi_fullname" name="kaprodi_fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="sekprodi_fullname">Nama Sekprodi</label>
                                <input type="text" id="edit_sekprodi_fullname" name="sekprodi_fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi_ps">Lokasi</label>
                                <input type="text" id="edit_lokasi_ps" name="lokasi_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kontak_ps">Kontak</label>
                                <input type="text" id="edit_kontak_ps" name="kontak_ps" class="form-control" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="vmts_ps">VMTS</label>
                                <input type="text" id="edit_vmts_ps" name="vmts_ps" class="form-control" required>
                            </div> -->
                            <div class="form-group">
                                <label for="vmts_ps">VMTS</label>
                                <textarea name="vmts_ps" id="edit_vmts_ps" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="bid_peminatan_ps">Bidang Peminatan</label>
                                <input type="text" id="edit_bid_peminatan_ps" name="bid_peminatan_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lulusan_ps">Lulusan</label>
                                <input type="text" id="edit_lulusan_ps" name="lulusan_ps" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="capaian_pembelajaran">Capaian Pembelajaran</label>
                                <input type="text" id="edit_capaian_pembelajaran" name="capaian_pembelajaran" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_is_prodi">Program Studi</label>
                                <select name="is_prodi" id="edit_is_prodi" class="form-control" required>
                                    <option value="Profesi Ners">Profesi Ners</option>
                                    <option value="Ilmu Keperawatan">Ilmu Keperawatan</option>
                                    <option value="Farmasi">Farmasi</option>
                                    <option value="Diploma Keperawatan">Diploma Keperawatan</option>
                                    <option value="Kebidanan">Kebidanan</option>
                                    <option value="Keselamatan dan Kesehatan Kerja">Keselamatan dan Kesehatan Kerja</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="is_publish">Status Publikasi</label>
                                <select id="edit_is_publish" name="is_publish" class="form-control">
                                    <option value="1">Dipublikasikan</option>
                                    <option value="0">Tidak Dipublikasikan</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function editData(id, kaprodi_fullname, sekprodi_fullname, lokasi_ps, kontak_ps, vmts_ps, bid_peminatan_ps, lulusan_ps, capaian_pembelajaran, is_publish, is_prodi) {
                document.getElementById('edit_id_ps').value = id;
                document.getElementById('edit_kaprodi_fullname').value = kaprodi_fullname;
                document.getElementById('edit_sekprodi_fullname').value = sekprodi_fullname;
                document.getElementById('edit_lokasi_ps').value = lokasi_ps;
                document.getElementById('edit_kontak_ps').value = kontak_ps;
                document.getElementById('edit_vmts_ps').value = vmts_ps;
                document.getElementById('edit_bid_peminatan_ps').value = bid_peminatan_ps;
                document.getElementById('edit_lulusan_ps').value = lulusan_ps;
                document.getElementById('edit_capaian_pembelajaran').value = capaian_pembelajaran;
                document.getElementById('edit_is_publish').value = is_publish;
                document.getElementById('edit_is_prodi').value = is_prodi;
                console.log(vmts_ps);
            }
        </script>
    </div>
</div>

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