<?php
include "ceklogin.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Sistem Pakar FC V2</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet">
    <link href="assets/images/logo.png" type="image/x-icon" rel="shortcut icon">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <h3>Login Administrator</h3><hr>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                    
                </div>
            </form>
        </div>
        <?php
        if (!empty($error)) {
            echo '<div class="alert bg-danger text-center" role="alert">' . $error . '</div>';
        }
        ?>
    </div>

    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>