<?php
include 'conn.php';
include 'header.php';
?>
<style>
    /* Global Style */
    body {
        margin: 0;
        font-family: 'Helvetica Neue', sans-serif;
        background-color: #f4f4f9;
        color: #333;
    }

    .containers {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    h1 {
        font-size: 2.8rem;
        font-weight: bold;
        text-align: center;
        color: #1a1a2e;
        margin-bottom: 20px;
        letter-spacing: 0.05rem;
    }

    .jargon-header {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 1.5rem;
        color: #fff;
        background: #4CAF50;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .jargon-list {
        list-style: none;
        padding: 0;
        margin-top: 30px;
    }

    .jargon-list li {
        margin: 15px 0;
        padding: 15px;
        border-radius: 8px;
        background-color: #eef5e8;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        font-size: 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .jargon-list li::before {
        content: '✔';
        color: #4CAF50;
        font-size: 1.5rem;
        margin-right: 10px;
    }

    .jargon-title {
        font-weight: bold;
        color: #222;
    }

    .jargon-desc {
        font-style: italic;
        color: #555;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .containers {
            margin: 20px;
            padding: 15px;
        }

        h1 {
            font-size: 2.2rem;
        }

        .jargon-list li {
            font-size: 1.1rem;
        }
    }
</style>




<div class="containers">
    <h1 class="jargon-header">FIKES S-I-G-A-P</h1>

    <ul class="jargon-list">
        <li>
            <span class="jargon-title">SANTUN</span>
            <span class="jargon-desc">dalam melayani</span>
        </li>
        <li>
            <span class="jargon-title">INFORMATIF</span>
            <span class="jargon-desc">untuk pemberitaan akademik</span>
        </li>
        <li>
            <span class="jargon-title">GIAT</span>
            <span class="jargon-desc">melayani berdasarkan permintaan</span>
        </li>
        <li>
            <span class="jargon-title">ADAPTIF</span>
            <span class="jargon-desc">jika terjadi perubahan</span>
        </li>
        <li>
            <span class="jargon-title">PERHATIAN</span>
            <span class="jargon-desc">jika terdapat masalah dan memberikan solusi</span>
        </li>
    </ul>
</div>
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
$sql = "SELECT id_form, jenis_form, caption_form, file_form, is_publish FROM form_unduh WHERE is_publish = 1";
$result = $conn->query($sql);

// Mengelompokkan data berdasarkan jenis_form
$forms = [];
while ($row = $result->fetch_assoc()) {
    $forms[$row['jenis_form']][] = $row;
}

$conn->close(); ?>
<div class="container mt-5">
    <h1 class="text-center">Form Unduh</h1>

    <?php foreach ($forms as $jenis_form => $items): ?>
        <div class="file-list">
            <div class="form-header">
                <h4><?= htmlspecialchars($jenis_form) ?></h4>
            </div>
            <ul class="list-group">
                <?php foreach ($items as $item): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($item['caption_form']) ?></strong>
                        <br>
                        <a href="admin/uploads/<?= htmlspecialchars($item['file_form']) ?>" target="_blank">Unduh File</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php' ?>