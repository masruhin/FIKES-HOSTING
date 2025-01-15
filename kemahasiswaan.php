<?php
include 'conn.php';
include 'header.php';

if (isset($_GET['pages'])) {
    $pages = $_GET['pages'];

    if ($pages == 'ukm') {
        $data = 'Unit Kegiatan Mahasiswa';
        $query = "SELECT
                         ukm.id_ukm, 
        ukm.nama_ukm,
        ukm.logo_ukm,
        ukm.periode_ukm,   
        ukm.pembina_ukm, 
        ukm.created_at, 
        ukm.ketua_ukm,
        ukm.keterangan_ukm,
        ukm.jenis_ukm
                    FROM
                        ukm WHERE jenis_ukm ='UKM-OLAHRAGA' OR jenis_ukm ='UKM-SOFTSKILL' ";
    } elseif ($pages == 'him') {
        $data = 'Badan Eksekutif Mahasiswa';
        $query = "SELECT
        ukm.id_ukm, 
        ukm.nama_ukm,
        ukm.logo_ukm,
        ukm.periode_ukm,   
        ukm.pembina_ukm, 
        ukm.created_at, 
        ukm.ketua_ukm,
        ukm.keterangan_ukm,
        ukm.jenis_ukm
    FROM
        ukm WHERE jenis_ukm ='HIM'";
    } else {
        $data = 'Halaman tidak ditemukan';
    }
}
$result = $conn->query($query);

?>
<style>
    .serial:hover,
    .country:hover,
    .visit:hover {
        background-color: #CBE2B5;
        cursor: pointer;
    }
</style>
<?php
$year = date('Y');
$next_year = $year + 1;
?>
<!-- Start Sample Area -->
<div class="container box_1170">
    <div class="section-top-border">
        <h3 class="mb-30">Kemahasiswaan Periode <?= date('Y') . '/' . $next_year ?></h3>
        <div class="progress-table-wrap">
            <table id="example1" class="table table-hover display nowrap" style="font-size: 13px;width:100%;font-weight: bold;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Informasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // Variabel untuk nomor urut
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php if (empty($data['logo_ukm']) or $data['logo_ukm'] == '') {
                                    $data['logo_ukm'] = $base_url . '/img/gallery.png';
                                } else {
                                    $data['logo_ukm'] = $base_url . '/admin/uploads/' . $data['logo_ukm'];
                                } ?>

                                <a href="<?= $data['logo_ukm']; ?>" class="img-pop-up">
                                    <img src="<?= $data['logo_ukm']; ?>" alt="Logo" style="width: 100px; height: auto; object-fit: contain;">
                                </a>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <blockquote class="generic-blockquote">
                                            <h4><?= $data['nama_ukm']; ?></h4></br>
                                            <h5>Pembina : <?= $data['pembina_ukm']; ?></h5></br>
                                            <h5>Ketua : <?= $data['ketua_ukm']; ?></h5></br>
                                            “ <?= $data['keterangan_ukm']; ?> “
                                        </blockquote>
                                    </div>
                                </div>
                            </td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End Sample Area -->

<?php include 'footer.php' ?>