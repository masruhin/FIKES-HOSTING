<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        // Insert data
        $keterangan_survey = $_POST['keterangan_survey'];
        $link_survey = $_POST['link_survey'];

        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO survey (keterangan_survey, link_survey) VALUES (?, ?)");
        $stmt->bind_param('ss', $keterangan_survey, $link_survey);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update data
        $id_survey = $_POST['id_survey'];
        $keterangan_survey = $_POST['keterangan_survey'];
        $link_survey = $_POST['link_survey'];

        // Update ke database
        $stmt = $conn->prepare("UPDATE survey SET keterangan_survey = ?, link_survey = ? WHERE id_survey = ?");
        $stmt->bind_param('ssi', $keterangan_survey, $link_survey, $id_survey);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_id'])) {
        // Hapus data
        $id_survey = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM survey WHERE id_survey = ?");
        $stmt->bind_param('i', $id_survey);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_survey, keterangan_survey, link_survey FROM survey";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Survey Management</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Keterangan Survey</th>
                            <th>Link Survey</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['keterangan_survey']) ?></td>
                                <td><?= htmlspecialchars($row['link_survey']) ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id_survey'], ENT_QUOTES); ?>', 
                                                         '<?= htmlspecialchars($row['keterangan_survey'], ENT_QUOTES); ?>', 
                                                         '<?= htmlspecialchars($row['link_survey'], ENT_QUOTES); ?>')"
                                        data-toggle="modal"
                                        data-target="#EditModal">Edit</button>

                                    <!-- Delete Form -->
                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_survey'] ?>">
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
                        <h5 class="modal-title">Tambah Survey</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="keterangan_survey">Keterangan Survey</label>
                                <input type="text" name="keterangan_survey" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="link_survey">Link Survey</label>
                                <input type="text" name="link_survey" class="form-control" required>
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
                        <h5 class="modal-title">Edit Survey</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_survey" id="edit_id_survey">
                            <div class="form-group">
                                <label for="edit_keterangan_survey">Keterangan Survey</label>
                                <input type="text" name="keterangan_survey" class="form-control" id="edit_keterangan_survey" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_link_survey">Link Survey</label>
                                <input type="text" name="link_survey" class="form-control" id="edit_link_survey" required>
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
    function editData(id, keterangan_survey, link_survey) {
        document.getElementById('edit_id_survey').value = id;
        document.getElementById('edit_keterangan_survey').value = keterangan_survey;
        document.getElementById('edit_link_survey').value = link_survey;
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