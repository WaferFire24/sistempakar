<?php
$link_data = '?page=rule';
$link_update = '?page=update_rule';

$kode_penyakit = '';
$nama_penyakit = '';
$combo_gejala = '';
// daftar gejala agar bisa dipilih multiple atau banyak
$combo_gejala .= '<select multiple class="selectpicker form-control" data-live-search="true" name="gejala[]" id="gejala" required title="Pilih...">';
$q = "select * from gejala order by id_gejala";
$q = mysqli_query($con, $q);
while ($r = mysqli_fetch_array($q)) {
    $combo_gejala .= '<option value="' . $r['id_gejala'] . '">' . $r['kode_gejala'] . ' - ' . $r['nama_gejala'] . '</option>';
}
$combo_gejala .= '</select>';

if (isset($_POST['save'])) {
    $error = '';
    $id = $_POST['id'];
    $action = $_POST['action'];
    $gejala = $_POST['gejala'];

    if (empty($error)) {
        if ($action == 'edit') {
            mysqli_query($con, "delete from rule where id_penyakit='" . $id . "'");
            foreach ($gejala as $val) {
                $q3 = "insert into rule(id_penyakit,id_gejala) values ('" . $id . "','" . $val . "')";
                mysqli_query($con, $q3);
            }
            exit("<script>location.href='" . $link_data . "';</script>");
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
        $gejala = array();
        $qgejala = "select * from rule where id_penyakit='$id'";
        $qgejala = mysqli_query($con, $qgejala);
        while ($rgejala = mysqli_fetch_array($qgejala)) { //perulangan untuk menampung data gejala
            $gejala[] = $rgejala['id_gejala'];
        }
        // set data gejala yang ada agar otomatis ter ceklis sesuai dengan data yang ada di database
        echo "
		<script>
			$(function() {
				$('#gejala').selectpicker('val', " . json_encode($gejala) . ");
			});
		</script>
		";
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        mysqli_query($con, "delete from rule where id_penyakit='" . $id . "'");
        exit("<script>location.href='" . $link_data . "';</script>");
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Rule</h3>
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
                    <input name="kode_penyakit" id="kode_penyakit" class="form-control" readonly type="text" value="<?php echo $kode_penyakit; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_penyakit" class="col-sm-2 control-label">Nama Penyakit</label>
                <div class="col-sm-4">
                    <input name="nama_penyakit" id="nama_penyakit" class="form-control" readonly type="text" value="<?php echo $nama_penyakit; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_gejala" class="col-sm-2 control-label">Daftar Gejala</label>
                <div class="col-sm-4">
                    <?php echo $combo_gejala; ?>
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