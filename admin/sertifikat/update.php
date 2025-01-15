<?php
include '../../conn.php'; // Database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM file_sertifikat WHERE id_sertifikat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $fullname_sertifikat = $_POST['fullname_sertifikat'];
    $is_publish = $_POST['is_publish'];

    // Check if a new file was uploaded
    if (!empty($_FILES['sertifikat']['name'])) {
        $pdfName = $_FILES['sertifikat']['name'];
        $tempName = $_FILES['sertifikat']['tmp_name'];
        $uploadPath = 'uploads/' . basename($pdfName);

        move_uploaded_file($tempName, $uploadPath);

        // Update with new PDF
        $sql = "UPDATE file_sertifikat SET fullname_sertifikat = ?, sertifikat = ?, is_publish = ? WHERE id_sertifikat = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssii', $fullname_sertifikat, $pdfName, $is_publish, $id);
    } else {
        // Update without changing the PDF
        $sql = "UPDATE file_sertifikat SET fullname_sertifikat = ?, is_publish = ? WHERE id_sertifikat = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sii', $fullname_sertifikat, $is_publish, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
        alert('Record has been updated successfully.');
        window.location.href = '../index.php?pages=read_sertifikat'; // Ubah sesuai dengan halaman tujuan setelah penghapusan
      </script>";
    } else {
        echo "<script>
                alert('Error !');
                window.location.href = '../index.php?pages=read_sertifikat'; // Ubah sesuai dengan halaman tujuan setelah penghapusan
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
