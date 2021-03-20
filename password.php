<?php
$link_update = '?page=password';
$id_pengguna = $_SESSION['LOG_USER'];

if (isset($_POST['save'])) {
    $password = $_POST['password'];
    $password_baru = $_POST['password_baru'];
    $ulangi = $_POST['ulangi'];
    $error = '';
    $success = '';

    if ($password_baru != $ulangi) {
        $error .= 'Password baru tidak sama';
    }
    if (empty($error)) {
        if (mysqli_num_rows(mysqli_query($con, "select * from pengguna where id_pengguna='" . $id_pengguna . "' and password='" . $password . "'")) > 0) {
            mysqli_query($con, "update pengguna set password='" . $password_baru . "' where id_pengguna='" . $id_pengguna . "'");
            $success = 'Password berhasil diubah';
        } else {
            $error .= 'Password lama salah';
        }
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Ubah Password</h3>
    </div>
    <form class="form-horizontal" action="<?php echo $link_update; ?>" method="post">
        <div class="box-body">
            <?php
            if (!empty($error)) {
                echo '<div class="alert bg-danger" role="alert">' . $error . '</div>';
            }
            if (!empty($success)) {
                echo '<div class="alert bg-success" role="alert">' . $success . '</div>';
            }
            ?>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password Lama</label>
                <div class="col-sm-4">
                    <input name="password" id="password" class="form-control" required autofocus type="password" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="password_baru" class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-4">
                    <input name="password_baru" id="password_baru" class="form-control" required type="password" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="ulangi" class="col-sm-2 control-label">Ulangi Password Baru</label>
                <div class="col-sm-4">
                    <input name="ulangi" id="ulangi" class="form-control" required type="password" value="">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="text-center col-sm-6">
                <button type="submit" name="save" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </form>
</div>