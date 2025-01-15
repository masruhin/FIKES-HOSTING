<!doctype html>
<html class="no-js" lang="eng">
  <?php
// Path file counter
$counter_file = 'counter.txt';

// Mengecek apakah file counter ada, jika tidak buat file dan isi dengan angka 0
if (!file_exists($counter_file)) {
  file_put_contents($counter_file, '0');
}

// Membaca isi file counter
$counter = (int)file_get_contents($counter_file);

// Tambah 1 setiap kali halaman diakses
$counter++;

// Menulis kembali nilai counter ke dalam file
file_put_contents($counter_file, $counter);
?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fakultas Ilmu Kesehatan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
    table th a {
      color: white;
      text-decoration: none;
      font-size: 14px;
    }

    table th a:hover {
      color: lightgray;
    }

    ul.submenu {
      display: none;
      position: absolute;
      background: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      padding: 10px;
      z-index: 1000;
      top: 100%;

    }

    li:hover>ul.submenu {
      display: block;
    }

    ul.submenu>li {
      position: relative;
    }

    ul.submenu ul.submenu {
      left: 100%;
      top: 0;
      display: none;
    }

    li:hover>ul.submenu>li:hover>ul.submenu {
      display: block;
    }

    li a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
    }

    li a:hover {
      background: #f4f4f4;
    }

    .menu-container {
      position: relative;
      display: inline-block;
    }

    ul.submenu {
      width: 200px;
    }

    ul.submenu ul.submenu {
      width: 200px;
    }

    @media (max-width: 768px) {

      .menu-container {
        position: relative;
      }

      ul.submenu {
        position: static;
        box-shadow: none;
        background: #f4f4f4;
        width: 100%;
      }

      ul.submenu ul.submenu {
        position: static;
        width: 100%;
      }

      li>a {
        display: block;
      }

      ul.submenu {
        display: none;
      }

      li.active>ul.submenu {
        display: block;
      }
    }

    #sticky-header .main-menu ul#navigation {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: nowrap;
    }

    #sticky-header .main-menu ul#navigation li {
      margin: 0 5px;
    }

    #sticky-header .main-menu ul#navigation li a {
      font-size: 14px;
      padding: 15px 10px;
    }

    #sticky-header .main-menu ul.submenu {
      width: auto;
      min-width: 200px;
    }

    .header_wrap {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: nowrap;
    }

    .header_right {
      display: flex;
      justify-content: flex-end;
      flex-wrap: nowrap;
      align-items: center;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-image: url("img/bg.jpg");
      /* Ini untuk background nya */
      background-size: cover;
      background-position: center center;
      background-attachment: fixed;

    }

    </style>
  </head>


  <header>
    <div class="header-area ">
      <div class="header-top_area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="header_top_wrap d-flex justify-content-between align-items-center">
                <div class="text_wrap">

                  <table>
                    <tr>
                      <th>
                        <a href="tautan.php"><span>Tautan Bhamada</span></a>
                      </th>
                      <!-- <th>
                      <a href="#"><span>Perpustakaan</span></a>
                    </th>
                    <th>
                      <a href="#"><span>Lab Terpadu</span></a>
                    </th>
                    <th>
                      <a href="#"><span>LPPM</span></a>
                    </th>
                    <th>
                      <a href="#"><span>LPM</span></a>
                    </th>
                    <th>
                      <a href="#"><span>Komite Etik</span></a>
                    </th>
                    <th>
                      <a href="#"><span>Program Studi</span></a>
                    </th> -->
                      <th><a></a></th>
                    </tr>
                  </table>
                </div>
                <div class="text_wrap">
                  <p><a href="<?= $base_url ?>/admin/login.php"> <i class="ti-user"></i> Login</a> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="sticky-header" class="main-header-area"
        style="background-color: #CBE2B5; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="header_wrap d-flex justify-content-between align-items-center">
                <div class="header_left">
                  <div class="logo">
                    <a href="#">
                      <img src="<?= $base_url . '/img/fikes.png' ?>" alt="" style="width:330px">
                    </a>
                  </div>
                </div>
                <div class="header_right d-flex align-items-center">
                  <div class="main-menu d-none d-lg-block">
                    <nav>
                      <ul id="navigation">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="#">Tentang Fikes<i class="ti-angle-down"></i></a>
                          <ul class="submenu" style="width: auto;;">
                            <!-- <li><a href="sejarah.php">Sejarah</a></li> -->
                            <li><a href="visi_misi.php">Visi Misi</a></li>
                            <li><a href="struktur.php">Struktur Organisasi</a></li>
                            <li>
                              <a href="#">Daftar Dosen <i class="ti-angle-right"></i></a>
                              <ul class="submenu" style="background-color: #C1E2A4;width: 250px;">
                                <li><a href="daftar_dosen.php?pages=keperawatan"> Keperawatan</a></li>
                                <li><a href="daftar_dosen.php?pages=kebidanan"> Kebidanan</a></li>
                                <li><a href="daftar_dosen.php?pages=farmasi"> Farmasi</a></li>
                                <li><a href="daftar_dosen.php?pages=k3"> K3</a></li>
                              </ul>
                            </li>
                            <!-- <li><a href="daftar_dosen.php">Daftar Dosen</a></li> -->
                            <!-- <li><a href="tenaga_kependidikan.php">Daftar Tenaga Kependidikan</a></li> -->
                            <li>
                              <a href="#">Kemahasiswaan <i class="ti-angle-right"></i></a>
                              <ul class="submenu" style="background-color: #C1E2A4;width: 250px;">
                                <li><a href="kemahasiswaan.php?pages=him"> Himpunan Mahasiswa</a></li>
                                <li><a href="kemahasiswaan.php?pages=ukm"> Unit Kegiatan Mahasiswa</a></li>
                                <!-- <li><a href="kemahasiswaan.php?pages=dpm"> DPM</a></li>
                              <li><a href="kemahasiswaan.php?pages=bem"> BEM</a></li> -->
                              </ul>
                            </li>
                            <li><a href="sertifikat.php">Sertifikat Akreditasi</a></li>
                            <li><a href="logo.php">Unduh Logo</a></li>
                          </ul>
                        </li>

                        <li><a href="#">Program Vokasi <i class="ti-angle-down"></i></a>
                          <ul class="submenu" style="width: 300px;">
                            <li>
                              <a href="#">Program Profesi <i class="ti-angle-right"></i></a>
                              <ul class="submenu" style="background-color: #C1E2A4;">
                                <li><a href="prodi.php?id=Profesi Ners">Profesi Ners (Ns.)</a></li>
                              </ul>
                            </li>
                            <li>
                              <a href="#">Program Sarjana <i class="ti-angle-right"></i></a>
                              <ul class="submenu" style="background-color: #C1E2A4;">
                                <li><a href="prodi.php?id=ilkep">Ilmu Keperawatan (S.Kep.)</a></li>
                                <li><a href="prodi.php?id=farmasi">Farmasi (S.Farm.)</a></li>
                              </ul>
                            </li>
                            <li>
                              <a href="#">Program Diploma <i class="ti-angle-right"></i></a>
                              <ul class="submenu" style="background-color: #C1E2A4;">
                                <li><a href="prodi.php?id=diploma keperawatan"> Keperawatan (A.Md.Kep.) </a></li>
                                <li><a href="prodi.php?id=kebidanan">Kebidanan (A.Md.Keb.) </a></li>
                                <li><a href="prodi.php?id=k3">keselamatan dan kesehatan kerja (S.Tr.KKK.)</a></li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li><a href="akademik.php">Akademik</a></li>
                        <li><a href="pelayanan.php">Pelayanan Fikes</a></li>
                        <li><a href="survey.php">Survey</a></li>
                        <!-- <li><a href="penelitian.php">Penelitian</a></li> -->
                        <!-- <li><a href="#">Otoritas <i class="ti-angle-down"></i></a>
                        <ul class="submenu" style="width: auto;">
                          <li><a href="otoritas.php?pages=repository">Repository </a></li>
                          <li><a href="otoritas.php?pages=sisekar">SISEKAR </a></li>
                          <li><a href="otoritas.php?pages=sicantik">SICANTIK </a></li>
                          <li><a href="otoritas.php?pages=sakti">SAKTI </a></li>
                          <li><a href="otoritas.php?pages=sister">SISTER </a></li>
                        </ul>
                      </li> -->
                        <!-- <li><a href="tautan.php">Tautan Bhamada</a></li> -->
                        <!-- <li><a href="tautan.php">Tautan Bhamada <i class="ti-angle-down"></i></a>
                        <ul class="submenu" style="width: auto;">
                          <li><a href="#">Universitas Bhamada Slawi </a></li>
                          <li><a href="#">Kemahasiswaan </a></li>
                          <li><a href="#">LPM (Lembaga Penjaminan Mutu) </a></li>
                          <li><a href="#">LPPM (Lembaga Penelitian dan Pengabdian pada Masyarakat) </a></li>
                          <li><a href="#">Unit Perpustakaan </a></li>
                          <li><a href="#">Unit Laboratorium terpadu </a></li>
                          <li><a href="#">Unit Humas dan Kerjasama </a></li>
                          <li><a href="#">Unit PMB (Penerimaan Mahasiswa Baru) </a></li>
                          <li><a href="#">Unit Sarpras </a></li>
                          <li><a href="#">Prodi D3 Keperawatan </a></li>
                          <li><a href="https://sim-epk.bhamada.ac.id/" target="_blank">Komite Etik </a></li>
                          <li><a href="#">Tracer Study </a></li>
                        </ul>
                      </li> -->
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header-end -->
