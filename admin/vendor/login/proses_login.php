<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
echo $username;
$query = mysqli_query($kon, "SELECT * FROM admin WHERE username='$username' AND password=md5('$password')");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
            $_SESSION['username'] = $data['username'];
            header("Location: index.php.php");
    }    else {
    $_SESSION['login_gagal'] = "Username dan password salah" ;
    header("Location: /login/login.php");
    }
 
?>