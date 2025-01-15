<?php
include 'conn.php';
include 'header.php';

if (isset($_GET['id'])) {
    // Ambil 'id' dari GET dan validasi jika diperlukan
    $id = $_GET['id'];
    if ($id == 'k3') {
        $id = 'Keselamatan dan Kesehatan Kerja';
    } elseif ($id == 'ilkep') {
        $id = 'Ilmu Keperawatan';
    }
    // Menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM `program_studi` WHERE is_prodi = ? AND is_publish = 1");
    $stmt->bind_param("s", $id); // "s" untuk string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Detail Program Studi: <?= $data['is_prodi'] ?></h2>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Kaprodi: <?= $data['kaprodi_fullname'] ?></h4>
                    <h5 class="card-subtitle mb-2 text-muted">Sekretaris Prodi: <?= $data['sekprodi_fullname'] ?></h5>
                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Program Studi:</strong> <?= $data['is_prodi'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Lokasi:</strong> <?= $data['lokasi_ps'] ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Kontak:</strong> <?= $data['kontak_ps'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Bidang Peminatan:</strong> <?= $data['bid_peminatan_ps'] ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Lulusan:</strong> Lulusan</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Capaian Pembelajaran:</strong> <?= $data['capaian_pembelajaran'] ?></p>
                        </div>
                    </div>

                    <hr>
                    <p class="card-text"><strong>Visi & Misi:</strong></p>
                    <p><?= $data['vmts_ps'] ?></p>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-primary">Home</a>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Detail Program Studi: Not Found!</h2>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Kaprodi: Not Found!</h4>
                    <h5 class="card-subtitle mb-2 text-muted">Sekretaris Prodi: Not Found!</h5>
                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Program Studi:</strong> Not Found!</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Lokasi:</strong> Not Found!</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Kontak:</strong> Not Found!</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Bidang Peminatan:</strong> Not Found!</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Lulusan:</strong> Lulusan</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Capaian Pembelajaran:</strong> Not Found!</p>
                        </div>
                    </div>

                    <hr>
                    <p class="card-text"><strong>Visi & Misi:</strong></p>
                    <p>Not Found!</p>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-primary">Home</a>
                </div>
            </div>
        </div><?php
            }

            $stmt->close();
        } else {
            echo "<p>ID tidak ditemukan.s</p>";
        }

        include 'footer.php';
                ?>