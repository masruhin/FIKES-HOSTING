<?php
include '../conn.php'; // Koneksi database

// Ambil data dari database
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

// Jika form disubmit (update)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_tentang = $_POST['id_tentang'];
    $sejarah = $_POST['sejarah'];
    $visi_misi = $_POST['visi_misi'];
    $caption_struktur_organisasi = $_POST['caption_struktur_organisasi'];

    // Ambil foto struktur organisasi yang ada sebelumnya
    $foto_struktur_organisasi = $data['foto_struktur_organisasi'];

    // Jika ada file baru yang diupload
    if (isset($_FILES['foto_struktur_organisasi']) && $_FILES['foto_struktur_organisasi']['error'] == 0) {
        $target_dir = "tentang/uploads/";
        $file_extension = pathinfo($_FILES['foto_struktur_organisasi']['name'], PATHINFO_EXTENSION);
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_file_name;

        // Upload file ke server
        if (move_uploaded_file($_FILES['foto_struktur_organisasi']['tmp_name'], $target_file)) {
            $foto_struktur_organisasi = $target_file;
        } else {
            echo "Error uploading file.";
            exit;
        }
    }

    // Query update
    $sql = "UPDATE tentang SET 
                sejarah = ?, 
                visi_misi = ?, 
                foto_struktur_organisasi = ?, 
                caption_struktur_organisasi = ? 
            WHERE id_tentang = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $sejarah, $visi_misi, $foto_struktur_organisasi, $caption_struktur_organisasi, $id_tentang);
        if ($stmt->execute()) {
            echo "<script>
                    alert('Record has been updated successfully.');
                    window.location.href = 'index.php?pages=read_tentang'; // Sesuaikan path redirect
                  </script>";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>


<div class='box'>
    <div class='box-header'>
        <h3 class='box-title'>Sejarah</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class='box-body pad'>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_tentang" value="<?= htmlspecialchars($data['id_tentang']) ?>">
            <textarea name="sejarah" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['sejarah'] ?></textarea>
    </div>
</div>

<div class='box'>
    <div class='box-header'>
        <h3 class='box-title'>Visi Misi</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class='box-body pad'>
        <textarea name="visi_misi" class="textarea" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['visi_misi'] ?></textarea>
    </div>
</div>

<div class='box'>
    <div class='box-header'>
        <h3 class='box-title'>Foto Struktur Organisasi & Keterangan</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class='box-body pad'>
        <!-- Display existing image -->
        <img src="<?= $base_url ?>/admin/<?= htmlspecialchars($data['foto_struktur_organisasi']) ?>" alt="Struktur Organisasi" style="width: 200px; height: 200px;">
        <br><br>
        <input type="file" class="form-control" name="foto_struktur_organisasi">
        <br>
        <textarea name="caption_struktur_organisasi" class="textarea" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['caption_struktur_organisasi'] ?></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>