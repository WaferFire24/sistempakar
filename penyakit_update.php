<?php
$link_data = '?page=penyakit';
$link_update = '?page=update_penyakit';

$kode_penyakit = '';
$nama_penyakit = '';
$deskripsi = '';
$solusi = '';

if (isset($_POST['save'])) {
    $error = '';
    $id = $_POST['id'];
    $action = $_POST['action'];
    $kode_penyakit = $_POST['kode_penyakit'];
    $nama_penyakit = mysqli_escape_string($con, $_POST['nama_penyakit']);
    $deskripsi = mysqli_escape_string($con, $_POST['deskripsi']);
    $solusi = mysqli_escape_string($con, $_POST['solusi']);

    if (empty($error)) {
        if ($action == 'add') {
            if (mysqli_num_rows(mysqli_query($con, "select * from penyakit where kode_penyakit='" . $kode_penyakit . "'")) > 0) {
                $error = 'Kode Penyakit sudah ada';
            } else {
                $q = "insert into penyakit(kode_penyakit,nama_penyakit,deskripsi,solusi) values ('" . $kode_penyakit . "','" . $nama_penyakit . "','" . $deskripsi . "','" . $solusi . "')";
                mysqli_query($con, $q);
                exit("<script>location.href='" . $link_data . "';</script>");
            }
        }
        if ($action == 'edit') {
            $q = mysqli_query($con, "select * from penyakit where id_penyakit='" . $id . "'");
            $r = mysqli_fetch_array($q);
            $kode_penyakit_tmp = $r['kode_penyakit'];
            if (mysqli_num_rows(mysqli_query($con, "select * from penyakit where kode_penyakit='" . $kode_penyakit . "' and kode_penyakit<>'" . $kode_penyakit_tmp . "'")) > 0) {
                $error = 'Kode Penyakit sudah ada';
            } else {
                $q = "update penyakit set kode_penyakit='" . $kode_penyakit . "',nama_penyakit='" . $nama_penyakit . "',deskripsi='" . $deskripsi . "',solusi='" . $solusi . "' where id_penyakit='" . $id . "'";
                mysqli_query($con, $q);
                exit("<script>location.href='" . $link_data . "';</script>");
            }
        }
    }
} else {
    $action = empty($_GET['action']) ? 'add' : $_GET['action'];
    if ($action == 'edit') {
        $id = $_GET['id'];
        $q = mysqli_query($con, "select * from penyakit where id_penyakit='" . $id . "'");
        $r = mysqli_fetch_array($q);
        $kode_penyakit = $r['kode_penyakit'];
        $nama_penyakit = $r['nama_penyakit'];
        $deskripsi = $r['deskripsi'];
        $solusi = $r['solusi'];
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        mysqli_query($con, "delete from penyakit where id_penyakit='" . $id . "'");
        exit("<script>location.href='" . $link_data . "';</script>");
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Penyakit</h3>
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
                <label for="kode_penyakit" class="col-sm-2 control-label">Kode Penyakit</label>
                <div class="col-sm-4">
                    <input name="kode_penyakit" id="kode_penyakit" class="form-control" required type="text" value="<?php echo $kode_penyakit; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_penyakit" class="col-sm-2 control-label">Nama Penyakit</label>
                <div class="col-sm-4">
                    <input name="nama_penyakit" id="nama_penyakit" class="form-control" required type="text" value="<?php echo $nama_penyakit; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-6">
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="6"><?php echo $deskripsi; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="solusi" class="col-sm-2 control-label">Solusi</label>
                <div class="col-sm-6">
                    <textarea name="solusi" id="solusi" class="form-control" rows="6"><?php echo $solusi; ?></textarea>
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