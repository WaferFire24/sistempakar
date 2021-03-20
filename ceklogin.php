<?php
$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q = mysqli_query($con, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($q) == 0) {
        $error = 'Username dan password salah!';
    }
    if (empty($error)) {
        $r = mysqli_fetch_array($q);
        $_SESSION['LOG_USER'] = $r['id_pengguna'];
        $_SESSION['LOG_LEVEL'] = $r['level'];
        header('location:index.php');
    }
}
