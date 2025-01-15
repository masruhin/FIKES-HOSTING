<?php
include '../conn.php'; // Koneksi ke database

// Proses CRUD (Create, Update, Delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        // Insert data
        $fullname = $_POST['fullname'];
        $jabatan = $_POST['jabatan'];
        $keterangan_dua = $_POST['keterangan_dua'];
        $keterangan_tiga = $_POST['keterangan_tiga'];
        $photo = '';

        // Upload photo (keterangan_satu)
        if (!empty($_FILES['keterangan_satu']['name'])) {
            $photoName = $_FILES['keterangan_satu']['name'];
            $photoTmp = $_FILES['keterangan_satu']['tmp_name'];
            $photoPath = 'uploads/' . basename($photoName);

            if (move_uploaded_file($photoTmp, $photoPath)) {
                $photo = $photoName;
            } else {
                echo "Gagal mengupload foto.";
            }
        }

        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO struktur_organisasi (fullname, jabatan, keterangan_satu, keterangan_dua, keterangan_tiga) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $fullname, $jabatan, $photo, $keterangan_dua, $keterangan_tiga);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update data
        $id = $_POST['id_struktur'];
        $fullname = $_POST['fullname'];
        $jabatan = $_POST['jabatan'];
        $keterangan_dua = $_POST['keterangan_dua'];
        $keterangan_tiga = $_POST['keterangan_tiga'];

        if (!empty($_FILES['keterangan_satu']['name'])) {
            $photoName = $_FILES['keterangan_satu']['name'];
            $photoTmp = $_FILES['keterangan_satu']['tmp_name'];
            $photoPath = 'uploads/' . basename($photoName);

            if (move_uploaded_file($photoTmp, $photoPath)) {
                $photo = $photoName;
                $stmt = $conn->prepare("UPDATE struktur_organisasi SET fullname = ?, jabatan = ?, keterangan_satu = ?, keterangan_dua = ?, keterangan_tiga = ? WHERE id_struktur = ?");
                $stmt->bind_param('sssssi', $fullname, $jabatan, $photo, $keterangan_dua, $keterangan_tiga, $id);
            }
        } else {
            $stmt = $conn->prepare("UPDATE struktur_organisasi SET fullname = ?, jabatan = ?, keterangan_dua = ?, keterangan_tiga = ? WHERE id_struktur = ?");
            $stmt->bind_param('ssssi', $fullname, $jabatan, $keterangan_dua, $keterangan_tiga, $id);
        }

        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_id'])) {
        // Hapus data
        $id = $_POST['delete_id'];
        $stmt = $conn->prepare("DELETE FROM struktur_organisasi WHERE id_struktur = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Ambil data dari database
$sql = "SELECT id_struktur, fullname, jabatan, keterangan_satu, keterangan_dua, keterangan_tiga FROM struktur_organisasi";
$result = $conn->query($sql);

$conn->close();
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Struktur Organisasi</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Tambah Data</button>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Jabatan</th>
                            <th>Photo</th>
                            <th>Keterangan</th>
                            <!-- <th>Keterangan Tiga</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no =1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['fullname']) ?></td>
                                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                                <td><img src="uploads/<?= htmlspecialchars($row['keterangan_satu']) ?>" width="50" height="50"></td>
                                <td><?= substr(($row['keterangan_dua']),0,40) ?>...</td>
                                <!-- <td><?= htmlspecialchars($row['keterangan_tiga']) ?></td> -->
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#EditModal"
                                        onclick="editData(<?= $row['id_struktur'] ?>, '<?= $row['fullname'] ?>', '<?= $row['jabatan'] ?>', '<?= $row['keterangan_satu'] ?>', '<?= $row['keterangan_dua'] ?>', '<?= $row['keterangan_tiga'] ?>')">Edit</button>
                                    <form action="" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="delete_id" value="<?= $row['id_struktur'] ?>">
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
                        <h5 class="modal-title">Tambah Struktur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="create">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_satu">Upload Photo</label>
                                <input type="file" name="keterangan_satu" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_dua">Keterangan</label>
                                <textarea name="keterangan_dua" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                               <!--  <label for="keterangan_tiga">Keterangan Tiga</label> --->
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <input type="hidden" name="keterangan_tiga" value="NULL">
                            </div> 
                         
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Struktur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_struktur" id="edit_id_struktur">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" id="edit_fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="edit_jabatan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_satu">Upload Photo</label>
                                <input type="file" name="keterangan_satu" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_dua">Keterangan Dua</label>
                                <textarea name="keterangan_dua" id="edit_keterangan_dua" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_tiga">Keterangan Tiga</label>
                                <textarea name="keterangan_tiga" id="edit_keterangan_tiga" class="form-control"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <script>
            function editData(id, fullname, jabatan, photo, keteranganDua, keteranganTiga) {
                document.getElementById('edit_id_struktur').value = id;
                document.getElementById('edit_fullname').value = fullname;
                document.getElementById('edit_jabatan').value = jabatan;
                document.getElementById('edit_keterangan_dua').value = keteranganDua;
                document.getElementById('edit_keterangan_tiga').value = keteranganTiga;
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