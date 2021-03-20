<?php
$link_data = '?page=rule';
$link_update = '?page=update_rule';

$list_data = '';
$q = "select * from penyakit order by id_penyakit";
$q = mysqli_query($con, $q);
if (mysqli_num_rows($q) > 0) {
    while ($r = mysqli_fetch_array($q)) {
        $id = $r['id_penyakit'];
        $gejala = array();
        $qgejala = "select * from rule where id_penyakit='$id'"; //ambil data gejala dari tabel rule
        $qgejala = mysqli_query($con, $qgejala);
        while ($rgejala = mysqli_fetch_array($qgejala)) { //perulangan untuk menampung data gejala
            $r_gejala = mysqli_fetch_array(mysqli_query($con, "select kode_gejala from gejala where id_gejala='" . $rgejala['id_gejala'] . "'"));
            $gejala[] = $r_gejala['kode_gejala'];
        }
        $daftar_gejala = implode(" - ", $gejala); //satukan data gejala dan tambahkan pemisah "-"
        $list_data .= '
		<tr>
		<td></td>
		<td>' . $r['kode_penyakit'] . '</td>
		<td>' . $r['nama_penyakit'] . '</td>
		<td>' . $daftar_gejala . '</td>
		<td>
		<a href="' . $link_update . '&amp;id=' . $id . '&amp;action=edit" class="btn btn-success btn-xs" title="Ubah"><i class="fa fa-edit"></i> Ubah</a> &nbsp;
		<a href="#" data-href="' . $link_update . '&amp;id=' . $id . '&amp;action=delete" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</a></td>
		</tr>';
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Rule</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTables1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penyakit</th>
                        <th>Nama Penyakit</th>
                        <th>Daftar Gejala</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $list_data; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>