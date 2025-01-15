<?php
include 'conn.php';
include 'header.php';
?>
<style>
    .form-header {
        background-color: #f7f7f7;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }

    .file-list {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
<!-- Start Form -->
<?php
// Ambil data dari database dengan kondisi is_publish = 1
$sql = "SELECT
    survey.id_survey, 
    survey.keterangan_survey, 
    survey.link_survey
FROM
    survey";
$result = $conn->query($sql);

// Mengelompokkan data berdasarkan id_survey
$forms = [];
while ($row = $result->fetch_assoc()) {
    $forms[$row['id_survey']][] = $row;
}

$conn->close(); ?>
<div class="container mt-5">
    <h1 class="text-center">Form Survey</h1>

    <?php foreach ($forms as $jenis_form => $items): ?>
        <div class="file-list">
            <?php foreach ($items as $item): ?>
                <div class="form-header">
                    <h4><?= htmlspecialchars($item['keterangan_survey']) ?></h4>
                </div>
                <ul class="list-group">

                    <li class="list-group-item">

                        <a href="<?= htmlspecialchars($item['link_survey']) ?>" target="_blank">Isi Survey ( Klik disini )</a>
                    </li>
                <?php endforeach; ?>
                </ul>
        </div>
    <?php endforeach; ?>
</div>
<div style="padding-bottom: 180px;">

</div>
<?php include 'footer.php'; ?>