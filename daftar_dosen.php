<?php
include 'conn.php';

// Query untuk mengambil data dosen berdasarkan halaman
if ($_GET['pages'] == 'keperawatan') {
    $title_1 = "D3 Keperawatan";
    $title_2 = "S1 Ilmu Keperawatan";
    $sql_1 = "SELECT id_dosen, fullname_dosen, foto_dosen, prodi_dosen FROM dosen WHERE prodi_dosen = 'D3 KEPERAWATAN' ORDER BY id_dosen ASC";
    $sql_2 = "SELECT id_dosen, fullname_dosen, foto_dosen, prodi_dosen FROM dosen WHERE prodi_dosen = 'S1 ILMU KEPERAWATAN' ORDER BY id_dosen ASC";
    $result1 = $conn->query($sql_1);
    $result2 = $conn->query($sql_2);
} else if ($_GET['pages'] == 'kebidanan') {
    $title_1 = "D3 KEBIDANAN";
    $sql_1 = "SELECT id_dosen, fullname_dosen, foto_dosen, prodi_dosen FROM dosen WHERE prodi_dosen = 'D3 KEBIDANAN' ORDER BY id_dosen ASC";
    $result1 = $conn->query($sql_1);
} else if ($_GET['pages'] == 'farmasi') {
    $title_1 = "FARMASI";
    $sql_1 = "SELECT id_dosen, fullname_dosen, foto_dosen, prodi_dosen FROM dosen WHERE prodi_dosen = 'S1 FARMASI' ORDER BY id_dosen ASC";
    $result1 = $conn->query($sql_1);
} else if ($_GET['pages'] == 'k3') {
    $title_1 = "Keselamatan Dan Kesehatan Kerja";
    $sql_1 = "SELECT id_dosen, fullname_dosen, foto_dosen, prodi_dosen FROM dosen WHERE prodi_dosen = 'K3' ORDER BY id_dosen ASC";
    $result1 = $conn->query($sql_1);
}

include 'header.php';
?>

<!-- popular_program_area_start  -->
<div class="popular_program_area section__padding">
    <div class="container">
        <!--<div class="section_title text-center">-->
        <!--    <h3>Dosen Program Studi <?= $title_1; ?></h3>-->
        <!--</div>-->
        <!--<br />-->

        <div class="row">
            <?php while ($data = $result1->fetch_assoc()): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single__program">
                        <div class="program_thumb">
                            <?php
                            if (empty($data['foto_dosen'])) {
                                $data['foto_dosen'] = $base_url . '/img/gallery.png';
                            } else {
                                $data['foto_dosen'] = $base_url . '/admin/uploads/foto_dosen/' . $data['foto_dosen'];
                            }
                            ?>
                            <img src="<?= $data['foto_dosen']; ?>" alt="Foto Dosen" style="width: 220px; height: 220px; object-fit: cover;">

                        </div>
                        <div class="program__content">
                            <span style="font-size: 14px;"><?= htmlspecialchars($data['fullname_dosen']); ?></span>
                            <!--<h4 style="font-size: 18px;"><?= htmlspecialchars($data['prodi_dosen']); ?></h4>-->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Jika ada result2, tampilkan data dosen lainnya -->
    <?php if (isset($result2)): ?>
        <div class="container">
            <!--<div class="section_title text-center">-->
            <!--    <h3>Dosen Program Studi <?= $title_2; ?></h3>-->
            <!--</div>-->
            <!--<br />-->

            <div class="row">
                <?php while ($data = $result2->fetch_assoc()): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="single__program">
                            <div class="program_thumb">
                                <?php
                                if (empty($data['foto_dosen'])) {
                                    $data['foto_dosen'] = $base_url . '/img/gallery.png';
                                } else {
                                    $data['foto_dosen'] = $base_url . '/admin/uploads/foto_dosen/' . $data['foto_dosen'];
                                }
                                ?>
                                <img src="<?= $data['foto_dosen']; ?>" alt="Foto Dosen" style="width: 220px; height: 220px; object-fit: cover;">

                            </div>
                            <div class="program__content">
                                <span style="font-size: 14px;"><?= htmlspecialchars($data['fullname_dosen']); ?></span>
                                <!--<h4 style="font-size: 18px;"><?= htmlspecialchars($data['prodi_dosen']); ?></h4>-->
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- popular_program_area_end -->

<?php include 'footer.php'; ?>