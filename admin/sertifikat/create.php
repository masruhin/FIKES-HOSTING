<?php
include '../conn.php'; // Database connection
if (isset($_POST['submit'])) {
    $fullname_sertifikat = $_POST['fullname_sertifikat'];
    $is_publish = $_POST['is_publish'];
    $uploadDir = 'uploads/';

    // Handle the file upload
    $pdfName = $_FILES['sertifikat']['name'];
    $tempName = $_FILES['sertifikat']['tmp_name'];
    $uploadPath = $uploadDir . basename($pdfName);

    if (move_uploaded_file($tempName, $uploadPath)) {
        $stmt = $conn->prepare("INSERT INTO file_sertifikat (fullname_sertifikat, sertifikat, is_publish) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $fullname_sertifikat, $pdfName, $is_publish);

        if ($stmt->execute()) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }

        $stmt->close();
    } else {
        echo "Failed to upload file.";
    }

    $conn->close();
}
?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input</h3>
            </div>
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="padding-left: 10px;padding-right:10px">
                    <label for="fullname">Full Name:</label>
                    <input  class="form-control" type="text" name="fullname_sertifikat" required>

                    <label for="sertifikat">Upload PDF:</label>
                    <input class="form-control" type="file" name="sertifikat" accept=".pdf" required>

                    <label for="is_publish">Publish:</label>
                    <select class="form-control" name="is_publish">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>


                </div>

                <div class="box-footer">
                    <input class="btn btn-primary" type="submit" name="submit" value="Upload">
            </form>
        </div>

    </div>

</div>