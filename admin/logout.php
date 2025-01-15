<?php
include '../conn.php';
session_start();
session_unset();
session_destroy();
echo '<script type="text/javascript">setTimeout(function() { window.location.href = "login.php" }, 1000);</script>';
