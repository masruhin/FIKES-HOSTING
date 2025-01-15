<?php
// Include database connection
include '../conn.php';

// Handle add, update, delete in one POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) { // Add new record
        $fullname_sertifikat = $_POST['fullname_sertifikat'];
        $is_publish = $_POST['is_publish'];
        $uploadDir = 'uploads/';
        $pdfName = $_FILES['sertifikat']['name'];
        $tempName = $_FILES['sertifikat']['tmp_name'];
        $uploadPath = $uploadDir . basename($pdfName);

        if (move_uploaded_file($tempName, $uploadPath)) {
            $stmt = $conn->prepare("INSERT INTO file_sertifikat (fullname_sertifikat, sertifikat, is_publish) VALUES (?, ?, ?)");
            $stmt->bind_param('ssi', $fullname_sertifikat, $pdfName, $is_publish);
            if ($stmt->execute()) {
                echo "<script>alert('File uploaded successfully!');</script>";
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Failed to upload file.');</script>";
        }
    }

    if (isset($_POST['delete'])) { // Delete record
        $id = $_POST['delete'];
        $stmt = $conn->prepare("DELETE FROM file_sertifikat WHERE id_sertifikat = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script>alert('Record deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error deleting record.');</script>";
        }
        $stmt->close();
    }

    if (isset($_POST['update'])) { // Update record
        $id = $_POST['id'];
        $fullname_sertifikat = $_POST['fullname_sertifikat'];
        $is_publish = $_POST['is_publish'];

        if (!empty($_FILES['sertifikat']['name'])) { // If new file is uploaded
            $pdfName = $_FILES['sertifikat']['name'];
            $tempName = $_FILES['sertifikat']['tmp_name'];
            $uploadPath = 'uploads/' . basename($pdfName);
            move_uploaded_file($tempName, $uploadPath);

            $sql = "UPDATE file_sertifikat SET fullname_sertifikat = ?, sertifikat = ?, is_publish = ? WHERE id_sertifikat = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssii', $fullname_sertifikat, $pdfName, $is_publish, $id);
        } else { // If no file change
            $sql = "UPDATE file_sertifikat SET fullname_sertifikat = ?, is_publish = ? WHERE id_sertifikat = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sii', $fullname_sertifikat, $is_publish, $id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Record updated successfully.');</script>";
        } else {
            echo "<script>alert('Error updating record.');</script>";
        }
        $stmt->close();
    }

    echo "<script>window.location.href = 'index.php?pages=read_sertifikat';</script>"; // Redirect to refresh the page
}


?>

<!-- Modal for Adding Certificate -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullname_sertifikat">Full Name:</label>
                        <input type="text" class="form-control" name="fullname_sertifikat" required>

                        <label for="sertifikat">Upload PDF:</label>
                        <input type="file" class="form-control" name="sertifikat" accept=".pdf" required>

                        <label for="is_publish">Publish:</label>
                        <select class="form-control" name="is_publish">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Table to Display Certificates -->
<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Certificates</h3>
        </div>
        <div class="box-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Add Certificate</button>
            <div class="table-responsive">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>PDF File</th>
                            <th>Publish</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id_sertifikat, fullname_sertifikat, sertifikat, is_publish FROM file_sertifikat";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        if ($result->num_rows > 0):
                            while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['fullname_sertifikat']) ?></td>
                                    <td><a href="uploads/<?= htmlspecialchars($row['sertifikat']) ?>" target="_blank">View PDF</a></td>
                                    <td><?= $row['is_publish'] ? 'Yes' : 'No' ?></td>
                                    <td>
                                        <form action="" method="POST" style="display:inline-block;">
                                            <input type="hidden" name="delete" value="<?= $row['id_sertifikat'] ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        <form action="" method="POST" style="display:inline-block;">
                                            <input type="hidden" name="id" value="<?= $row['id_sertifikat'] ?>">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal<?= $row['id_sertifikat'] ?>">Edit</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal for Editing Certificate -->
                                <div class="modal fade" id="EditModal<?= $row['id_sertifikat'] ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Certificate</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" value="<?= $row['id_sertifikat'] ?>">
                                                        <label for="fullname_sertifikat">Full Name:</label>
                                                        <input type="text" class="form-control" name="fullname_sertifikat" value="<?= htmlspecialchars($row['fullname_sertifikat']) ?>" required>

                                                        <label for="sertifikat">Upload PDF (Optional):</label>
                                                        <input type="file" class="form-control" name="sertifikat" accept=".pdf">

                                                        <label for="is_publish">Publish:</label>
                                                        <select class="form-control" name="is_publish">
                                                            <option value="1" <?= $row['is_publish'] ? 'selected' : '' ?>>Yes</option>
                                                            <option value="0" <?= !$row['is_publish'] ? 'selected' : '' ?>>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                        else: ?>
                            <tr>
                                <td colspan="5">No certificates found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
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