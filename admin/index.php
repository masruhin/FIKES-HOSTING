<?php
require_once '../conn.php';
session_start();
$id = $_SESSION['user_id'];
if (!isset($id)) {
    header("Location: {$base_url}/admin/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Web Fakultas</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?= $base_url ?>/admin/vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
</head>

<body class="skin-black">
    <header class="header">
        <a href="#" class="logo">
            FakultasWEB
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <ul class="dropdown-menu">
                            <li>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <ul class="dropdown-menu">
                        </ul>
                    </li>
                    <li class="dropdown tasks-menu">
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Admin <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header bg-light-blue">
                                <img src="<?= $base_url . 'vendor/img/avatar3.png' ?>" class="img-circle" alt="User Image" />
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?= $base_url . '/admin/logout.php' ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= $base_url . '/admin/vendor/img/avatar3.png' ?>" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>Hello, Admin</p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="treeview <?= ($_GET['pages'] == 'read_home' || $_GET['pages'] == 'read_galery') ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Home</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?= ($_GET['pages'] == 'read_home') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_home">
                                    <i class="fa fa-angle-double-right"></i> Header
                                </a>
                            </li>
                            <li class="<?= ($_GET['pages'] == 'read_galery') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_galery">
                                    <i class="fa fa-angle-double-right"></i> Galery
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview <?= ($_GET['pages'] == 'read_tentang' || $_GET['pages'] == 'read_dosen' || $_GET['pages'] == 'read_struktur' || $_GET['pages'] == 'read_sertifikat' || $_GET['pages'] == 'read_logo') ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Tentang Fikes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?= ($_GET['pages'] == 'read_tentang') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_tentang">
                                    <i class="fa fa-angle-double-right"></i> Sejarah,VisiMisi,& Struktur
                                </a>
                            </li>
                            <li class="<?= ($_GET['pages'] == 'read_dosen') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_dosen">
                                    <i class="fa fa-angle-double-right"></i> Dosen
                                </a>
                            </li>
                            <li class="<?= ($_GET['pages'] == 'read_struktur') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_struktur">
                                    <i class="fa fa-angle-double-right"></i> Struktur Kampus
                                </a>
                            </li>
                            <li class="<?= ($_GET['pages'] == 'read_sertifikat') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_sertifikat">
                                    <i class="fa fa-angle-double-right"></i> Sertifikat
                                </a>
                            </li>
                            <li class="<?= ($_GET['pages'] == 'read_logo') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_logo">
                                    <i class="fa fa-angle-double-right"></i> Logo
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($_GET['pages'] == 'read_prodi') ? 'active' : '' ?>">
                        <a href="index.php?pages=read_prodi">
                            <i class="fa fa-th"></i> <span>Program Studi</span>
                        </a>
                    </li>
                    <li class="<?= ($_GET['pages'] == 'read_form') ? 'active' : '' ?>">
                        <a href="index.php?pages=read_form">
                            <i class="fa fa-th"></i> <span>Form Pelayanan </span>
                        </a>
                    </li>
                    <li class="<?= ($_GET['pages'] == 'read_akademik') ? 'active' : '' ?>">
                        <a href="index.php?pages=read_akademik">
                            <i class="fa fa-th"></i> <span>Akademik </span>
                        </a>
                    </li>
                    <li class="<?= ($_GET['pages'] == 'read_survey') ? 'active' : '' ?>">
                        <a href="index.php?pages=read_survey">
                            <i class="fa fa-th"></i> <span>Survey Kepuasan </span>
                        </a>
                    </li>
                    <li class="treeview <?= ($_GET['pages'] == 'read_prestasi' || $_GET['pages'] == 'read_kemahasiswaan') ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-bar-chart-o"></i>
                            <span>Kemahasiswaan</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?= ($_GET['pages'] == 'read_prestasi') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_prestasi">
                                    <i class="fa fa-angle-double-right"></i> Prestasi
                                </a>
                            </li>
                            <li class="<?= ($_GET['pages'] == 'read_kemahasiswaan') ? 'active' : '' ?>">
                                <a href="index.php?pages=read_kemahasiswaan">
                                    <i class="fa fa-angle-double-right"></i> Ormawa
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($_GET['pages'] == 'read_users') ? 'active' : '' ?>">
                        <a href="index.php?pages=read_users">
                            <i class="fa fa-th"></i> <span>Users </span>
                        </a>
                    </li>
                </ul>

            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">


            </section>

            <!-- Main content -->
            <section class="content">

                <?php
                if (isset($_GET['pages'])) {
                    switch ($_GET['pages']) {
                        case 'read_home':
                            include './header_home/read.php';
                            break;
                        case 'create_home':
                            include './header_home/create.php';
                            break;
                        case 'read_tentang':
                            include './tentang/read.php';
                            break;
                        case 'read_sertifikat':
                            include './sertifikat/read.php';
                            break;
                        case 'create_sertifikat':
                            include './sertifikat/create.php';
                            break;
                        case 'read_dosen':
                            include './tentang/read_dosen.php';
                            break;
                        case 'read_struktur':
                            include './struktur/read.php';
                            break;
                        case 'read_prestasi':
                            include './prestasi/read.php';
                            break;
                        case 'read_galery':
                            include './galery_photo/read.php';
                            break;
                        case 'read_prodi':
                            include './program_studi/read.php';
                            break;
                        case 'read_logo':
                            include './logo/read.php';
                            break;
                        case 'read_form':
                            include './form/read.php';
                            break;
                        case 'read_survey':
                            include './survey/read.php';
                            break;
                        case 'read_akademik':
                            include './akademik/read.php';
                            break;
                        case 'read_kemahasiswaan':
                            include './kemahasiswaan/read.php';
                            break;
                        case 'read_users':
                            include './users/read.php';
                            break;
                        default:
                            include '404.php';
                            break;
                    }
                }

                ?>

            </section>
        </aside>
    </div>

    <script src="<?= $base_url ?>/admin/vendor/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/AdminLTE/app.js" type="text/javascript"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/AdminLTE/dashboard.js" type="text/javascript"></script>



</body>

</html>