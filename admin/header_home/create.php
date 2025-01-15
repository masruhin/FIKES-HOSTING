<?php 
include '../conn.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $caption_header = $_POST['caption_header'];
    $is_publish = isset($_POST['is_publish']) ? 1 : 0;

    // Handle file upload for 'photo_header'
    $photo_header = '';
    if (isset($_FILES['photo_header']) && $_FILES['photo_header']['error'] == 0) {
        $target_dir = "header_home/uploads/";  // Ensure this directory exists and is writable
        $file_extension = pathinfo($_FILES['photo_header']['name'], PATHINFO_EXTENSION);
        $new_file_name = uniqid() . '.' . $file_extension;  // Generate a unique file name
        $target_file = $target_dir . $new_file_name;  // Full path for saving file on server

        // Check if the directory is writable
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            echo "Upload directory does not exist or is not writable.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['photo_header']['tmp_name'], $target_file)) {
            $photo_header = $new_file_name; // Save only the file name to the database
        } else {
            echo "Error uploading file.";
            exit;
        }
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO header_home (caption_header, photo_header, is_publish) 
                            VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $caption_header, $photo_header, $is_publish);

    if ($stmt->execute()) {
        echo "New record created successfully";
        echo "<script>window.location.href = '".$base_url."/admin/index.php?pages=read_home';</script>";
    } else {
        echo "Error: " . $stmt->error;
        echo "<script>window.location.href = '".$base_url."/admin/index.php?pages=create_home';</script>";
    }

    $stmt->close();
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
                <div class="form-group" style="padding-left: 10px; padding-right:10px">
                    <label for="caption_header">Caption Header:</label><br>
                    <textarea class="form-control" name="caption_header" required></textarea><br>

                    <label for="photo_header">Photo Header:</label><br>
                    <input type="file" name="photo_header" accept="image/*"><br><br>

                    <label for="is_publish">Is Publish:</label><br>
                    <input type="checkbox" name="is_publish" value="1"><br><br>
                </div>

                <div class="box-footer">
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form> <!-- Moved this here to correctly close the form -->
        </div>
    </div>
</div>
