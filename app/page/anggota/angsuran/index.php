<?php
	$x = new angsuran($db);
	$f = $x -> fetch();
?>
<div class="content">
	<div class="page-header">
		<div class="title">Angsuran Saya</div>
		<ol class="breadcrumb">
			<li class="active">Angsuran saya</li>
		</ol>
	</div>

	<div class="container-default">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-title">
						Angsuran Saya
					</div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Angsuran</th>
									<th>Kategori Angsuran</th>
									<th>Besar Angsuran</th>
									<th>Tanggal Setoran</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($ang as $data) { ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>	
									<td></td>
									<td></td>
									<td></td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>

