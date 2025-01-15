<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $jenis_form = $_POST['jenis_form'];
        $caption_form = $_POST['caption_form'];
        $file_form = '';
        if (!empty($_FILES['file_form']['name'])) {
            $fileName = $_FILES['file_form']['name'];
            $fileTmp = $_FILES['file_form']['tmp_name'];
            $filePath = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmp, $filePath)) {
                $file_form = $fileName;
            } else {
                echo "Gagal mengupload file.";
            }
        }

        $stmt = $conn->prepare("INSERT INTO form_unduh (jenis_form, caption_form, file_form, is_publish) VALUES (?, ?, ?, ?)");
        $is_publish = 1;
        $stmt->bind_param('sssi', $jenis_form, $caption_form, $file_form, $is_publish);
        $stmt->execute();
        $stmt->close();
    }
    // Update
    elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id_form = $_POST['id_form'];
        $jenis_form = $_POST['jenis_form'];
        $caption_form = $_POST['caption_form'];

        if (!empty($_FILES['file_form']['name'])) {
            $fileName = $_FILES['file_form']['name'];
            $fileTmp = $_FILES['file_form']['tmp_name'];
            $filePath = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmp, $filePath)) {
                $stmt = $conn->prepare("UPDATE form_unduh SET jenis_form = ?, caption_form = ?, file_form = ? WHERE id_form = ?");
                $stmt->bind_param('sssi', $jenis_form, $caption_form, $fileName, $id_form);
            }
        } else {
            $stmt = $conn->prepare("UPDATE form_unduh SET jenis_form = ?, caption_form = ? WHERE id_form = ?");
            $stmt->bind_param('ssi', $jenis_form, $caption_form, $id_form);
        }

        $stmt->execute();
        $stmt->close();
    }
    // Delete
    elseif (isset($_POST['delete_id'])) {
        $id_form = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM form_unduh WHERE id_form = ?");
        $stmt->bind_param('i', $id_form);
        $stmt->execute();
        $stmt->close();
    }
}
$sql = "SELECT id_form, jenis_form, caption_form, file_form, is_publish FROM form_unduh";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Form Unduh</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Form</th>
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
                                <td><?= htmlspecialchars($row['jenis_form']) ?></td>
                                <td><?= htmlspecialchars($row['caption_form']) ?></td>
                                <td><a href="uploads/<?= htmlspecialchars($row['file_form']) ?>" target="_blank">Download</a></td>
                                <td><?= $row['is_publish'] ? 'Dipublikasikan' : 'Tidak Dipublikasikan' ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id_form'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['jenis_form'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['caption_form'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['file_form'], ENT_QUOTES) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>

                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_form'] ?>">
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
                        <h5 class="modal-title">Tambah Form Unduh</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="jenis_form">Jenis Form</label>
                                <select class="form-control" name="jenis_form" id="edit_jenis_form" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Layanan Mahasiswa">Layanan Mahasiswa</option>
                                    <option value="Layanan">Layanan Dosen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="caption_form">Caption</label>
                                <input type="text" name="caption_form" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="file_form">Upload File</label>
                                <input type="file" name="file_form" class="form-control" required>
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
                        <h5 class="modal-title">Edit Form Unduh</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_form" id="edit_id_form">
                            <div class="form-group">
                                <label for="edit_jenis_form">Jenis Form</label>
                                <select class="form-control" name="jenis_form" id="edit_jenis_form" required>
                                    <option value="Layanan Mahasiswa">Layanan Mahasiswa</option>
                                    <option value="Layanan Dosen">Layanan Dosen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_caption_form">Caption</label>
                                <input type="text" name="caption_form" class="form-control" id="edit_caption_form" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_file_form">Upload File (jika ingin mengganti)</label>
                                <input type="file" name="file_form" class="form-control" accept=".pdf,.docx,.jpg,.png">
                                <small>Biarkan kosong jika tidak ingin mengganti file.</small>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script>
    function editData(id_form, jenis_form, caption_form, file_form) {
        $('#edit_id_form').val(id_form);
        $('#edit_jenis_form').val(jenis_form);
        $('#edit_caption_form').val(caption_form);
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