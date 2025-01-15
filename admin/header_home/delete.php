<?php
// Koneksi ke database
include '../../conn.php'; // Database connection

// Ambil ID dari URL
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Buat query SQL untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM header_home WHERE `header_home`.`id` = '$id'";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman utama dengan pesan sukses
        echo "<script>
                alert('Record has been deleted successfully.');
                window.location.href = '../index.php?pages=read_home'; // Ubah sesuai dengan halaman tujuan setelah penghapusan
              </script>";
    } else {
        // Jika penghapusan gagal, tampilkan pesan kesalahan
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Jika ID tidak ada, arahkan kembali ke halaman utama
    echo "<script>
            alert('ID not found.');
            window.location.href = 'index.php?pages=read_home'; // Ubah sesuai dengan halaman tujuan
          </script>";
}

// Tutup koneksi ke database
$conn->close();
?>
