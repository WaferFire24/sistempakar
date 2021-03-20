<?php
$link_proses='?page=proses_konsultasi';

$chk_gejala='';
$q="select * from gejala order by id_gejala";
$q=mysqli_query($con,$q);
while($r=mysqli_fetch_array($q)){
	$kode_gejala = $r['kode_gejala'];
	$nama_gejala = $r['nama_gejala'];
	$chk_gejala.='
	<tr>
		<td align="center"><input type="checkbox" name="gejala[]" class="flat" value="'.$r['id_gejala'].'"></td>
		<td>'.$kode_gejala.' - '.$nama_gejala.'</td>
	</tr>';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
		$('#frm').submit(function(){
			if(!$('input[type=checkbox]:checked').length) {
				$('#chkModal').modal('show');
				return false;
			}
			return true;
		});

		$('input[type="checkbox"].flat').iCheck({
          checkboxClass: 'icheckbox_flat-green'
        });
    });
</script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Konsultasi</h3>
	</div>
	<form action="<?php echo $link_proses;?>" id="frm" method="post" >
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="40"></th>
							<th><h3>Pilih gejala yang dirasakan</h3></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $chk_gejala; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer">
			<div class="text-center col-sm-2">
				<button type="submit" name="proses" class="btn btn-success">Proses</button>
			</div>
		</div>
	</form>
</div>
<div class="modal fade" id="chkModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p>Pilih gejala yang dirasakan</p>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
			</div>
        </div>
    </div>
</div>