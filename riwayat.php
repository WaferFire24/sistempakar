<?php
$link_data = '?page=riwayat';
$link_update = '?page=update_riwayat';

$list_data = '';
$q = "select * from riwayat order by id_riwayat DESC";
$q = mysqli_query($con, $q);
if (mysqli_num_rows($q) > 0) {
    while ($r = mysqli_fetch_array($q)) {
        $id = $r['id_riwayat'];
        $r_pengguna = mysqli_fetch_array(mysqli_query($con, "select nama_lengkap from pengguna where id_pengguna='" . $r['id_pengguna'] . "'"));
        if (is_null($r['id_penyakit'])) {
            $nama_penyakit = 'Penyakit tidak terdiagnosa';
        } else {
            $r_penyakit = mysqli_fetch_array(mysqli_query($con, "select nama_penyakit from penyakit where id_penyakit='" . $r['id_penyakit'] . "'"));
            $nama_penyakit = $r_penyakit['nama_penyakit'];
        }
        $list_data .= '
		<tr>
		<td></td>
		<td>' . date('d-m-Y', strtotime($r['tanggal'])) . '</td>
		<td>' . $r_pengguna['nama_lengkap'] . '</td>
		<td>' . $nama_penyakit . '</td>
		<td>
            <a href="#" data-href="' . $link_update . '&amp;id=' . $id . '&amp;action=delete" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
        </td>
		</tr>';
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Riwayat Diagnosa User</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTables1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama User</th>
                        <th>Nama Penyakit</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"> Cetak</i></button>
                	
                    <?php echo $list_data; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>