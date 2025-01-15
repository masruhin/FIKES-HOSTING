<?php
include '../../conn.php'; // Database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $sql = "DELETE FROM file_sertifikat WHERE id_sertifikat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Record has been deleted successfully.');
                window.location.href = '../index.php?pages=read_sertifikat'; // Ubah sesuai dengan halaman tujuan setelah penghapusan
              </script>";
    } else {
        echo "<script>
        alert('Record has been deleted Failed.');
        window.location.href = '../index.php?pages=read_sertifikat'; // Ubah sesuai dengan halaman tujuan setelah penghapusan
      </script>";
    }

    $stmt->close();
}

$conn->close();
?>
