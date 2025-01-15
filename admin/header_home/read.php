<?php
include '../conn.php'; // Database connection
$sql = "SELECT * FROM header_home";
$result = $conn->query($sql);
?>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header">
            <h3 class="box-title">Home Header</h3>
        </div>
        <div class="box-body">
            <a href="index.php?pages=create_home" class="btn btn-primary">Add Data</a>
            <div class="box-body table-responsive no-padding" style="overflow-x:auto;">
                <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                    <thead style="text-align: center;">
                        <tr>
                            <th>#</th>
                            <th>Caption Header</th>
                            <th>Is Publish</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['caption_header']; ?></td>
                                    <td><?php echo $row['is_publish'] ? 'Yes' : 'No'; ?></td>
                                    <td>
                                        <!-- Tombol untuk membuka modal Edit -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Edit</button>

                                        <!-- Form Delete dengan method POST -->
                                        <form action="header_home/delete.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Header Home</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="header_home/update.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="caption_header">Caption Header</label>
                                                        <input type="text" class="form-control" name="caption_header" value="<?php echo $row['caption_header']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="header_home/uploads/<?php echo $row['photo_header']; ?>" alt="Photo Header" style="width: 200px; height: 200px;">
                                                        <input type="hidden" name="file_exist" value="<?php echo $row['photo_header']; ?>">
                                                        <input type="file" class="form-control" name="photo_header" value="<?php echo $row['photo_header']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="is_publish">Is Publish</label>
                                                        <select class="form-control" name="is_publish" required>
                                                            <option value="1" <?php echo ($row['is_publish']) ? 'selected' : ''; ?>>Yes</option>
                                                            <option value="0" <?php echo (!$row['is_publish']) ? 'selected' : ''; ?>>No</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No records found</td>
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