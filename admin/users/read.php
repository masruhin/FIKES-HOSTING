<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = 1;
        $is_active = 1;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fullname, username, password, level, is_active) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssii', $fullname, $username, $hashed_password, $level, $is_active);
        $stmt->execute();
        $stmt->close();
    }


    // Update
    elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $level = 1;

        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE users SET fullname = ?, username = ?, password = ?, level = ? WHERE id = ?");
            $stmt->bind_param('sssii', $fullname, $username, $hashed_password, $level, $id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET fullname = ?, username = ?, level = ? WHERE id = ?");
            $stmt->bind_param('ssii', $fullname, $username, $level, $id);
        }

        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}
$sql = "SELECT id, fullname, username, level, is_active FROM users";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Daftar Pengguna</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Pengguna</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['fullname']) ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['level']) ?></td>
                                <td><?= $row['is_active'] ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-warning"
                                        onclick="editData('<?= htmlspecialchars($row['id'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['fullname'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['username'], ENT_QUOTES) ?>', 
                                                        '<?= htmlspecialchars($row['level'], ENT_QUOTES) ?>')"
                                        data-toggle="modal" data-target="#EditModal">Edit</button>

                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
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
                        <h5 class="modal-title">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <input type="hidden" class="form-control" name="level" value="1">
                            <!-- <div class="form-group">
                                <label for="level">Level</label>
                             
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div> -->
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
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="form-group">
                                <label for="edit_fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control" id="edit_fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_username">Username</label>
                                <input type="text" name="username" class="form-control" id="edit_username" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_password">Password (Isi jika ingin mengubah)</label>
                                <input type="password" name="password" class="form-control" id="edit_password">
                                <small>Biarkan kosong jika tidak ingin mengubah password.</small>
                            </div>
                            <input type="hidden" class="form-control" name="level" id="edit_level" value="1">
                            <!-- <div class="form-group">
                                <label for="edit_level">Level</label>
                          
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div> -->
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    function editData(id, fullname, username, level) {
        $('#edit_id').val(id);
        $('#edit_fullname').val(fullname);
        $('#edit_username').val(username);
        $('#edit_level').val(level);
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