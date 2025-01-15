<?php
include 'conn.php';
include 'header.php';
if (isset($_GET['pages'])) {
    if ($_GET['pages'] == 'repository') {
        $pages = $_GET['pages'];
    } elseif ($_GET['pages'] == 'sisekar') {
        $pages = $_GET['pages'];
    } elseif ($_GET['pages'] == 'sicantik') {
        $pages = $_GET['pages'];
    } elseif ($_GET['pages'] == 'sakti') {
        $pages = $_GET['pages'];
    } elseif ($_GET['pages'] == 'sister') {
        $pages = $_GET['pages'];
    }
}
?>
</br>
<section>
    <center>
        <h1 style="height: 50vh;"><?= $pages ?></h1>
    </center>

</section>
<?php

include 'footer.php';
