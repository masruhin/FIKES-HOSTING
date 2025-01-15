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
</br>
<!-- Start Sample Area -->
<section class="sample-text-area">
    <div class="container box_1170">
        <h3 class="text-heading">Struktur Organisasi</h3>
        <div class="col-md-12">
            <a href="<?= $base_url . '/admin/' . $data['foto_struktur_organisasi'] ?>" class="img-pop-up">
                <img src="<?= $base_url . '/admin/' . $data['foto_struktur_organisasi'] ?>" alt="Struktur Organisasi" style="width: 100%; height: auto; object-fit: contain;">
            </a>
        </div>
        <p class="sample-text">
            <?= $data['caption_struktur_organisasi'] ?>
        </p>
    </div>
</section>


<!-- popular_program_area_start  -->
<div class="popular_program_area section__padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center">
                    <h3>Struktur Organisasi</h3>
                </div>
            </div>
        </div>
        </br>

        <?php
        $sql = "SELECT id_struktur, fullname, jabatan, keterangan_satu, keterangan_dua, keterangan_tiga FROM struktur_organisasi";
        $result = $conn->query($sql);
        $firstItem = true; // Flag untuk data pertama
        ?>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <!-- Cek jika ini adalah data pertama -->
                        <?php if ($firstItem): ?>
                            <center>
                                <!-- Mulai baris baru setelah data pertama -->
                            <?php endif; ?>
                            <div class="<?= $firstItem ? 'col-lg-6 col-md-6' : 'col-lg-4 col-md-6' ?>">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="admin/uploads/<?= htmlspecialchars($row['keterangan_satu']) ?>" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span><?= htmlspecialchars($row['fullname']) ?></span>
                                        <h4 style="font-size: 22px;"><?= htmlspecialchars($row['jabatan']) ?></h4>
                                        <!-- Potong teks keterangan_dua menjadi 30 karakter -->
                                        <p id="keterangan_dua_<?= $row['id_struktur'] ?>">
                                            <?= strlen($row['keterangan_dua']) > 50 ? substr(htmlspecialchars($row['keterangan_dua']), 0, 50) . '...' : htmlspecialchars($row['keterangan_dua']) ?>
                                        </p>
                                        <!-- Button untuk menampilkan teks lengkap -->

                                        <button class="boxed-btn5" onclick="showFullText(<?= $row['id_struktur'] ?>, '<?= htmlspecialchars(addslashes($row['keterangan_dua'])) ?>')">Read Full</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Jika ini adalah item pertama, kita tutup barisnya -->
                            <?php if ($firstItem): ?>
                            </center>
                </div>
                <div class="row"> <!-- Mulai baris baru setelah data pertama -->
                <?php $firstItem = false;
                            endif; ?>
            <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sample Area -->
<script>
    function showFullText(id, fullText) {
        const element = document.getElementById('keterangan_dua_' + id);
        element.innerHTML = fullText;
    }
</script>
<?php include 'footer.php' ?>