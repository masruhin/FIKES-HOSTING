<?php
include 'conn.php';
include 'header.php';
$sql = "SELECT id_akademik, judul_akademik, file_akademik, keterangan_akademik, type_akademik, created_at FROM akademik";
$result = $conn->query($sql);
?>

<style>
    /* General styles for the accordion */
    .accordion {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        width: 100%;
        max-width: 780px;
        /* This will make sure the accordion doesn't exceed 780px on larger screens */
    }

    /* Style for the accordion header */
    .accordion-header {
        border-bottom: 1px solid #e0e0e0;
    }

    /* Style for the accordion button */
    .accordion-button {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    /* Change background color on hover */
    .accordion-button:hover {
        background-color: #e9ecef;
    }

    /* Style for the accordion button when collapsed */
    .accordion-button.collapsed {
        color: black;
    }

    /* Style for the accordion body */
    .accordion-body {
        background-color: #ffffff;
        padding: 15px;
        color: #555;
    }

    @media (max-width: 576px) {
        .accordion {
            margin: 10px;
            max-width: 100%;
            /* Allow full width on small screens */
        }

        .accordion-button {
            font-size: 14px;
            /* Make text smaller on mobile */
        }

        .accordion-body {
            font-size: 14px;
            /* Adjust text size for smaller screens */
        }
    }

    @media (max-width: 768px) {
        .accordion {
            margin: 15px;
        }

        .accordion-button {
            font-size: 16px;
            /* Adjust text size slightly for tablet screens */
        }

        .accordion-body {
            font-size: 15px;
        }
    }
</style>

<link href="custom.css" rel="stylesheet" crossorigin="anonymous">
<style>
    /* General styles for the accordion */
    .accordion {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: 10px auto;
        width: 100%;
        max-width: 780px;
        /* This will make sure the accordion doesn't exceed 780px on larger screens */
    }

    /* Style for the accordion header */
    .accordion-header {
        border-bottom: 1px solid #e0e0e0;
    }

    /* Style for the accordion button */
    .accordion-button {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    /* Change background color on hover */
    .accordion-button:hover {
        background-color: #e9ecef;
    }

    /* Style for the accordion button when collapsed */
    .accordion-button.collapsed {
        color: black;
    }

    /* Style for the accordion body */
    .accordion-body {
        background-color: #ffffff;
        padding: 15px;
        color: #555;
    }

    @media (max-width: 576px) {
        .accordion {
            margin: 10px;
            max-width: 100%;
            /* Allow full width on small screens */
        }

        .accordion-button {
            font-size: 14px;
            /* Make text smaller on mobile */
        }

        .accordion-body {
            font-size: 14px;
            /* Adjust text size for smaller screens */
        }
    }

    @media (max-width: 768px) {
        .accordion {
            margin: 15px;
        }

        .accordion-button {
            font-size: 16px;
            /* Adjust text size slightly for tablet screens */
        }

        .accordion-body {
            font-size: 15px;
        }
    }
</style>
</br>
<section class="sample-text-area">
    <center>
        <div class="col-lg-8 col-md-10">
            <div class="section_title text-center mb-70">
                <h3 class="mb-10">Akademik</h3>
                <p>Fakultas Ilmu Kesehatan Univ Bhamadi</p>
            </div>
        </div>
    </center>
    <center>
        <div class="accordion" id="accordionExample">
            <?php
            // Loop through each record and create an accordion item
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id_akademik'];
                    $judul = htmlspecialchars($row['judul_akademik']);
                    $keterangan = htmlspecialchars($row['keterangan_akademik']);
                    $file = htmlspecialchars($row['file_akademik']);
                    $created_at = htmlspecialchars($row['created_at']);
            ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $id; ?>">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>">
                                <?php echo $judul; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $id; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $id; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <b><?php echo $keterangan; ?></b> <br>
                                <strong>Dipublikasikan pada:</strong> <?php echo $created_at; ?><br>
                                <?php if ($file): ?>
                                    <strong>File:</strong> <a href="admin/uploads/<?php echo $file; ?>" target="_blank">Download</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='accordion-item'><h2 class='accordion-header'>No data available</h2></div>";
            }
            ?>
        </div>
    </center>
</section>

<?php
include 'footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>