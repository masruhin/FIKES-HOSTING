<?php

include 'conn.php';
$sql = "SELECT
	prestasi.id_prestasi, 
	prestasi.jenis_prestasi, 
	prestasi.nama_mahasiswa, 
	prestasi.keterangan_satu, 
	prestasi.keterangan_dua, 
	prestasi.waktu_perolehan, 
	prestasi.photo_prestasi
FROM
	prestasi"; // Sesuaikan kondisi id_tentang

$result = $conn->query($sql);
// $data = $result->fetch_assoc();

include 'header.php';
?>

<div class="event_details_area section__padding">
        <div class="container">
            <div class="row">
                <?php
                 while($data = $result->fetch_assoc()) { ?>
                <div class="col-lg-12">
                    <div class="single_event d-flex align-items-center">
                        <div class="thumb">
                            <img src="<?= $base_url.'/admin/uploads/' .$data['photo_prestasi'] ?>" alt="">
                            <div class="date text-center">
                                <h4><?= date('d', strtotime($data['waktu_perolehan'])) ?></h4>
                                <span><?= date('M Y', strtotime($data['waktu_perolehan'])) ?></span>
                            </div>
                        </div>
                        <div class="event_details_info">
                            <div class="event_info">
                                <a href="#">
                                    <h4><?= $data['jenis_prestasi'] ?> | <?= $data['nama_mahasiswa'] ?></h4>
                                 </a>
                                <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> <?= $data['waktu_perolehan'] ?> </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                            </div>
                            <p class="event_info_text"><?=$data['keterangan_satu'] ?>
                            </p>
                            <!-- <a href="#" class="boxed-btn3">Book a seat</a> -->
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'?>