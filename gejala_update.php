<?php
$link_data = '?page=gejala';
$link_update = '?page=update_gejala';

$kode_gejala = '';
$nama_gejala = '';

if (isset($_POST['save'])) {
    $error = '';
    $id = $_POST['id'];
    $action = $_POST['action'];
    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = mysqli_escape_string($con, $_POST['nama_gejala']);

    if (empty($error)) {
        if ($action == 'add') {
            if (mysqli_num_rows(mysqli_query($con, "select * from gejala where kode_gejala='" . $kode_gejala . "'")) > 0) {
                $error = 'Kode Gejala sudah ada';
            } else {
                $q = "insert into gejala(kode_gejala,nama_gejala) values ('" . $kode_gejala . "','" . $nama_gejala . "')";
                mysqli_query($con, $q);
                exit("<script>location.href='" . $link_data . "';</script>");
            }
        }
        if ($action == 'edit') {
            $q = mysqli_query($con, "select * from gejala where id_gejala='" . $id . "'");
            $r = mysqli_fetch_array($q);
            $kode_gejala_tmp = $r['kode_gejala'];
            if (mysqli_num_rows(mysqli_query($con, "select * from gejala where kode_gejala='" . $kode_gejala . "' and kode_gejala<>'" . $kode_gejala_tmp . "'")) > 0) {
                $error = 'Kode Gejala sudah ada';
            } else {
                $q = "update gejala set kode_gejala='" . $kode_gejala . "',nama_gejala='" . $nama_gejala . "' where id_gejala='" . $id . "'";
                mysqli_query($con, $q);
                exit("<script>location.href='" . $link_data . "';</script>");
            }
        }
    }
} else {
    $action = empty($_GET['action']) ? 'add' : $_GET['action'];
    if ($action == 'edit') {
        $id = $_GET['id'];
        $q = mysqli_query($con, "select * from gejala where id_gejala='" . $id . "'");
        $r = mysqli_fetch_array($q);
        $kode_gejala = $r['kode_gejala'];
        $nama_gejala = $r['nama_gejala'];
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        mysqli_query($con, "delete from gejala where id_gejala='" . $id . "'");
        exit("<script>location.href='" . $link_data . "';</script>");
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Gejala</h3>
    </div>
    <form class="form-horizontal" action="<?php echo $link_update; ?>" method="post">
        <input name="id" type="hidden" value="<?php echo $id; ?>">
        <input name="action" type="hidden" value="<?php echo $action; ?>">
        <div class="box-body">
            <?php
            if (!empty($error)) {
                echo '<div class="alert bg-danger" role="alert">' . $error . '</div>';
            }
            ?>
            <div class="form-group">
                <label for="kode_gejala" class="col-sm-2 control-label">Kode Gejala</label>
                <div class="col-sm-4">
                    <input name="kode_gejala" id="kode_gejala" class="form-control" required type="text" value="<?php echo $kode_gejala; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_gejala" class="col-sm-2 control-label">Nama Gejala</label>
                <div class="col-sm-4">
                    <input name="nama_gejala" id="nama_gejala" class="form-control" required type="text" value="<?php echo $nama_gejala; ?>">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="text-center col-sm-6">
                <button type="submit" name="save" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo $link_data; ?>" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
            </div>
        </div>
    </form>
</div>