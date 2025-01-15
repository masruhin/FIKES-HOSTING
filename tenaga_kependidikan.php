<?php

include 'conn.php';

// Query untuk mengambil data dosen
$sql = "SELECT * FROM `tenaga_ahli`";
$result = $conn->query($sql);

include 'header.php';
?>
<style>
    .serial:hover,
    .country:hover,
    .visit:hover {
        background-color: #CBE2B5;
        /* Warna background saat di-hover */
        cursor: pointer;
        /* Menambahkan pointer cursor saat di-hover */
    }
</style>
<!-- Start Sample Area -->
<div class="container box_1170">
    <div class="section-top-border">
        <h3 class="mb-30">Tenaga Kependidikan</h3>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                    <div class="serial">#</div>
                    <div class="country">Nama</div>
                    <div class="visit">Fakultas</div>
                </div>

                <!-- Menampilkan data dosen -->
                <?php
                $no = 1; // Variabel untuk nomor urut
                while ($data = $result->fetch_assoc()) { ?>
                    <div class="table-row">
                        <div class="serial"><?= $no++; ?></div>
                        <div class="country" style="width:400px"><?= $data['fullname_tenaga_ahli']; ?></div>
                        <div class="visit" style="width:490px"><?= $data['level_tenaga_ahli']; ?></div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- End Sample Area -->

<?php include 'footer.php'; ?>