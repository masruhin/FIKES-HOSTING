<?php
include 'conn.php';
$sql = "SELECT 
            id_tentang, 
            sejarah, 
            visi_misi, 
            foto_struktur_organisasi, 
            caption_struktur_organisasi 
        FROM tentang
        WHERE id_tentang = 1"; // Sesuaikan kondisi id_tentang

$result = $conn->query($sql);
$data = $result->fetch_assoc();

include 'header.php';
?>

<!-- Start Sample Area -->
</br>
<section class="sample-text-area">
    <div class="container box_1170">
        <h3 class="text-heading">Sejarah</h3>
        <p class="sample-text">
            <?= $data['sejarah'] ?>
        </p>
    </div>
</section>
<!-- End Sample Area -->

<?php include 'footer.php' ?>