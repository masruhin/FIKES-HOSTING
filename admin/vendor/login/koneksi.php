<?php
/* nama server kita */
$servername = "localhost";

/* nama database kita */
$database = "adminlte"; 

/* nama user yang terdaftar pada database (default: root) */
$username = "root";

/* password yang terdaftar pada database (default : "") */ 
$password = ""; 

/* membuat koneksi */
$conn = mysqli_connect($servername, $username, $password, $database);




/* ============================
      NANTI KODE NYA DISINI 
   ============================*/
   

/* menutup koneksi */
mysqli_close($conn);
?>