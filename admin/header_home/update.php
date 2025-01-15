<?php
include '../../conn.php'; // Database connection

// Mengecek apakah request POST diterima
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $caption_header = $_POST['caption_header'];
    $is_publish = isset($_POST['is_publish']) ? $_POST['is_publish'] : 0;

    // Menghapus foto lama jika ada
    $photo_exist = isset($_POST['file_exist']) ? $_POST['file_exist'] : '';
    if (!empty($photo_exist)) {
        $file_path = '/' . $photo_exist; // Path lengkap ke file yang akan dihapus
        // Cek apakah file ada
        if (file_exists($file_path)) {
            // Hapus file
            if (!unlink($file_path)) {
                echo "Error deleting file.";
                exit;
            }
        }
    }

    $photo_header = '';
    // Mengupload file baru jika ada
    if (isset($_FILES['photo_header']) && $_FILES['photo_header']['error'] == 0) {
        $target_dir = "uploads/"; 
        $file_extension = pathinfo($_FILES['photo_header']['name'], PATHINFO_EXTENSION);
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        // Pastikan direktori upload ada dan dapat ditulis
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            echo "Upload directory does not exist or is not writable.";
            exit;
        }

        if (move_uploaded_file($_FILES['photo_header']['tmp_name'], $target_file)) {
            $photo_header = $new_file_name; // Hanya nama file, bukan path lengkap
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        // Jika tidak ada file baru, gunakan foto lama
        $photo_header = $photo_exist;
        
    }

    // Query untuk update data
    $sql = "UPDATE header_home SET caption_header = ?, photo_header = ?, is_publish = ? WHERE id = ?";

    // Gunakan prepared statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssii", $caption_header, $photo_header, $is_publish, $id); // "ssii" artinya dua string, dua integer
        if ($stmt->execute()) {
            echo "<script>
                    alert('Record has been updated successfully.');
                    window.location.href = '../index.php?pages=read_home'; // Redirect setelah sukses
                  </script>";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>
