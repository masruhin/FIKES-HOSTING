<?php
session_start();
include '../conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT id, username, password, level FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];
            header("Location: {$base_url}/admin/index.php?pages=read_home");
            exit;
        } else {
            $_SESSION['error'] = "Incorrect password";
        }
    } else {
        $_SESSION['error'] = "User not found";
    }

    $stmt->close();
    $conn->close();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html class="bg-black">

<head>
    <meta charset="UTF-8">
    <title> Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?= $base_url ?>/admin/vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>/admin/vendor/css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-black">

    <div class="form-box" id="login-box">
        <div class="header">Sign In</div>
        <form action="" method="post">
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>

            </div>
            <div class="footer">
                <button type="submit" class="btn bg-olive btn-block">Sign me in</button>
            </div>
        </form>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?= $base_url ?>/admin/vendor/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>