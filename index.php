<?php
include 'conn.php';
include 'header.php';
?>
<link rel="stylesheet" href="style.css">
<!-- slider_area_start -->
<div style="padding-top: 5px;">

</div>

<div class="slider_area">
  <div class="slider_active owl-carousel">
    <?php
    $sql = "SELECT * FROM header_home WHERE is_publish = 1";
    $header = $conn->query($sql);
    if ($header->num_rows > 0): ?>
      <?php while ($row = $header->fetch_assoc()): ?>
        <div class="single_slider d-flex align-items-center" style="
          background-image: url('<?= $base_url . '/admin/header_home/uploads/' . htmlspecialchars($row['photo_header']) ?>');
          background-size: cover; /* Ensure the image covers the container without distortion */
          background-position: center; /* Center the image */
          background-repeat: no-repeat; /* Prevent the background from repeating */
          width: 100vw; /* Full width of the viewport */
          height: 100vh; /* Full height of the viewport */
          min-height: 600px; /* Optional: set a minimum height */
        ">
          <div class="container">
            <div class="row">
              <div class="col-xl-12" style="position: absolute; bottom: 50px; left: 50%; transform: translateX(-50%); text-align: center;">
                <div class="slider_text">
                  <h4 style="color: #ffffff;"><?= htmlspecialchars($row['caption_header']) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No headers available.</p>
    <?php endif; ?>
  </div>
</div>


<!-- Ucapan Selamat Modal -->
<div id="congratulationsModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h5>Selamat dan Sukses!</h5>
    <p>Kepada seluruh civitas akademika, kami ucapkan selamat atas terakreditasinya Program Studi kami. Semoga ini menjadi langkah awal untuk mencapai prestasi yang lebih baik di masa depan.</p>
  </div>
</div>




</br>
</br>
<center>
  <div class="col-lg-8 col-md-10">
    <div class="section_title text-center mb-70">
      <h3 class="mb-10">Galery</h3>
      <p>Foto area kampus, area pelayanan Fikes dan Dekanat</p>
    </div>
  </div>
</center>
<?php
$sql = "SELECT
	galery_photo.id_galery_photo, 
	galery_photo.caption, 
	galery_photo.file_galery_photo, 
	galery_photo.is_publish
FROM
	galery_photo 
  WHERE is_publish = 1";
$header = $conn->query($sql);
if ($header->num_rows > 0): ?>
  <div class="container" style="max-width:920px">
    <?php
    $slideNumber = 1;
    foreach ($header as $row): ?>
      <div class="mySlides" style="max-width:920px">
        <div class="numbertext"><?= $slideNumber ?> / <?= $header->num_rows ?></div>
        <img src="<?= $base_url ?>/admin/uploads/<?= $row['file_galery_photo'] ?>" style="width:100%">
      </div>
    <?php
      $slideNumber++;
    endforeach; ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption" style="font-family: sans-serif;color:black;font-size:19px"></p>
      <div class="row">
        <?php
        $slideNumber = 1;
        foreach ($header as $row): ?>
          <div class="column">
            <img class="demo cursor" src="<?= $base_url ?>/admin/uploads/<?= $row['file_galery_photo'] ?>" style="width:100%" onclick="currentSlide(<?= $slideNumber ?>)" alt="<?= htmlspecialchars($row['caption']) ?>">
          </div>
        <?php
          $slideNumber++;
        endforeach; ?>
      </div>
    </div>
  </div>
  </div>
<?php endif; ?>


<script>
  // Fungsi untuk menampilkan teks lengkap
  function showFullText(id, fullText) {
    const element = document.getElementById('keterangan_dua_' + id);
    element.innerHTML = fullText;
  }
  let slideIndex = 1;
  showSlides(slideIndex);

  // Function to show slides automatically
  function autoShowSlides() {
    slideIndex++;
    showSlides(slideIndex);
  }

  // Set interval to change slides every 2 seconds (2000 milliseconds)
  setInterval(autoShowSlides, 2000);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo");
    let captionText = document.getElementById("caption");

    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
      slides[i].classList.remove('show'); // Sembunyikan semua slide
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", ""); // Hapus kelas aktif dari semua titik
    }

    slides[slideIndex - 1].classList.add('show'); // Tampilkan slide saat ini
    dots[slideIndex - 1].className += " active"; // Sorot titik saat ini
    captionText.innerHTML = dots[slideIndex - 1].alt; // Atur teks caption
  }

  // Show modal after 1.5 seconds
  setTimeout(function() {
    document.getElementById('congratulationsModal').style.display = 'block';
  }, 1500);

  // Close modal automatically after 15 seconds
  setTimeout(function() {
    closeModal();
  }, 15000);

  // Function to close modal
  function closeModal() {
    document.getElementById('congratulationsModal').style.display = 'none';
  }
</script>
<?php include 'footer.php' ?>