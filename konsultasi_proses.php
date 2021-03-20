<?php
$link_konsultasi = '?page=konsultasi';

function arrays_are_equal($array1, $array2)
{
    array_multisort($array1);
    array_multisort($array2);
    return (serialize($array1) === serialize($array2));
}

if (isset($_POST['proses'])) {

    $id_pengguna = isset($_SESSION['LOG_USER']) ? $_SESSION['LOG_USER'] : '';
    $tanggal = date('Y-m-d');

    // -------- forward chaining --------------
    // --------------------- START ------------------------
    $arr_gejala_terpilih = array();
    $list_data = '';
    $no = 0;

    for ($i = 0; $i < count($_POST['gejala']); $i++) {
        $gejala = $_POST['gejala'][$i];
        $arr_gejala_terpilih[] = $gejala;
        $rgejala = mysqli_fetch_array(mysqli_query($con, "SELECT kode_gejala,nama_gejala FROM gejala where id_gejala = " . $gejala));
        $list_data .= '
        <tr>
            <td>' . ++$no . '</td>
            <td>' . $rgejala['kode_gejala'] . ' - ' . $rgejala['nama_gejala'] . '</td>
        </tr>
        ';
    }

    $id_penyakit_hasil = '';
    $nama_penyakit_hasil = '';
    $sql1 = mysqli_query($con, "select id_penyakit,nama_penyakit from penyakit order by id_penyakit");
    while ($r = mysqli_fetch_array($sql1)) {
        $id_penyakit = $r['id_penyakit'];
        $nama_penyakit = $r['nama_penyakit'];
        $arr_gejala_penyakit = array();
        $sql_at = mysqli_query($con, "select id_gejala from rule where id_penyakit='$id_penyakit' order by id_gejala");
        while ($r_at = mysqli_fetch_array($sql_at)) {
            $id_gejala = $r_at['id_gejala'];
            $arr_gejala_penyakit[] = $id_gejala;
        }
        if (arrays_are_equal($arr_gejala_terpilih, $arr_gejala_penyakit)) {
            $id_penyakit_hasil = $id_penyakit;
            $nama_penyakit_hasil = $nama_penyakit;
        }
    }

    if ($nama_penyakit_hasil != '') {
        $q = "insert into riwayat(id_pengguna,id_penyakit,tanggal) values ('" . $id_pengguna . "','" . $id_penyakit_hasil . "','" . $tanggal . "')";
        mysqli_query($con, $q);
    } else {
        $nama_penyakit_hasil = '<b>Tidak ada jenis penyakit yang sesuai dengan gejala terpilih</b>';
        $q = "insert into riwayat(id_pengguna,tanggal) values ('" . $id_pengguna . "','" . $tanggal . "')";
        mysqli_query($con, $q);
    }
    // --------------------- END -------------------------

    $tbl_hasil = '';
    $tbl_hasil .= '
        <tr>
            <td width="120">Nama Penyakit</td>
            <td>' . $nama_penyakit_hasil . '</td>
        </tr>
        ';

    if (!empty($id_penyakit_hasil)) {
        $rpenyakit = mysqli_fetch_array(mysqli_query($con, "select * from penyakit where id_penyakit='" . $id_penyakit_hasil . "'"));
        $tbl_hasil = '
		<tr>
			<td width="120">Nama Penyakit</td>
			<td><strong>' . $rpenyakit['kode_penyakit'] . ' - ' . $rpenyakit['nama_penyakit'] . '</strong></td>
		</tr>
		<tr>
			<td>Diskripsi</td>
			<td style="white-space: pre-wrap; word-wrap: break-word;">' . $rpenyakit['deskripsi'] . '</td>
		</tr>
        <tr>
            <td>Solusi</td>
            <td style="white-space: pre-wrap; word-wrap: break-word;">' . $rpenyakit['solusi'] . '</td>
        </tr>
		';
    }


?>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Konsultasi</h3>
        </div>
        <div class="box-body">
            <div class='table-responsive'>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th width="40">No</th>
                            <th>Gejala yang dipiilh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $list_data; ?>
                    </tbody>
                </table>
            </div>
            <h3 class="page-header">Hasil Konsultasi</h3>
            <div class='table-responsive'>
                <table class='table table-bordered'>
                    <tbody>
                        <?php echo $tbl_hasil; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <div class="text-center col-sm-12">
                <a href="<?php echo $link_konsultasi; ?>" class="btn btn-primary">Ulangi Konsultasi</a> &nbsp;
            </div>
        </div>
    </div>
<?php } ?>