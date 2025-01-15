<?php
include 'conn.php'; // Koneksi ke database
include 'header.php';

?>

</br>
<div class="container mt-5">
    <h2 class="text-center-heading">Unduh Logo</h2>
    <div class="row">
        <!-- Looping data dari database -->
        <?php
        include 'conn.php'; // Koneksi ke database
        $query = "SELECT id_logo, file_logo, caption_logo, is_publish FROM logo WHERE is_publish = 1";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) { ?>
            <div class="col-4 mb-4 logo-card">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= htmlspecialchars($row['caption_logo']) ?></h5>
                    <!-- Button untuk membuka modal -->
                    <button type="button" class="custom-button" onclick="openModal(<?= $row['id_logo'] ?>)">
                        Lihat Gambar
                    </button>
                </div>
            </div>

            <!-- Modal untuk menampilkan gambar -->
            <div id="logoModal<?= $row['id_logo'] ?>" class="modal-custom">
                <div class="modal-content-custom">
                    <span class="close" onclick="closeModal(<?= $row['id_logo'] ?>)">&times;</span>
                    <h5 class="modal-title"><?= htmlspecialchars($row['caption_logo']) ?></h5>
                    <div class="modal-body-custom text-center">
                        <img src="admin/uploads/<?= htmlspecialchars($row['file_logo']) ?>" class="img-custom" alt="<?= htmlspecialchars($row['caption_logo']) ?>">
                    </div>
                    <div class="modal-footer-custom">
                        <!-- Button unduh gambar -->
                        <a href="admin/uploads/<?= htmlspecialchars($row['file_logo']) ?>" download="<?= htmlspecialchars($row['file_logo']) ?>" class="download-button">Unduh Gambar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div style="padding-top: 300px;"></div>

<script>
    // JavaScript untuk membuka modal
    function openModal(id) {
        document.getElementById('logoModal' + id).style.display = "block";
    }

    // JavaScript untuk menutup modal
    function closeModal(id) {
        document.getElementById('logoModal' + id).style.display = "none";
    }
</script>

<?php include 'footer.php'; ?>

<!-- Custom CSS -->
<style>
    /* Container Styling */
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Style for logo cards */
    .logo-card {
        display: inline-block;
        width: 30%;
        margin-right: 1.5%;
        margin-left: 1.5%;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .logo-card h5 {
        margin-bottom: 10px;
    }

    .custom-button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-button:hover {
        background-color: #45a049;
    }

    /* Modal Styling */
    .modal-custom {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content-custom {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 5px;
        position: relative;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .close {
        position: absolute;
        top: 10px;
        right: 25px;
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-body-custom {
        margin: 20px 0;
    }

    .img-custom {
        width: 100%;
        max-width: 400px;
        height: auto;
        border-radius: 5px;
    }

    .modal-footer-custom {
        text-align: center;
        padding: 10px;
    }

    .download-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .download-button:hover {
        background-color: #45a049;
    }
</style>