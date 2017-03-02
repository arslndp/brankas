<?php 
session_start();
if ($_SESSION['AKUN']['type_user'] == 'ANGOTA') {
?>
<?php
	$x = new pinjaman($db);
	$f = $x -> myPinjaman();
	$no = 1;
?>
<div class="content">
	<div class="page-header">
		<h1 class="title">Data Pinjaman</h1>
		<ol class="breadcrumb">
			<li class="active">Data logs Pinjaman</li>
		</ol>
	</div>

	<div class="container-padding">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-warning">
					<div class="panel-heading">
						INGAT!!
					</div>
					<div class="panel-body">
						Ketahuilah paket - paket pinjaman dalam brankas yakni meliputi :
						<ul>
							<li>Paket 1 : 1.000.000 -> Angsuran 10x cicilan 100.000/bln</li>
							<li>Paket 2 : 2.500.000 -> Angsuran 10x cicilan 250.000/bln</li>
							<li>Paket 3 : 5.000.000 -> Angsuran 10x cicilan 500.000/bln</li>
							<li>Paket 4 : 10.000.000 -> Angsuran 10x cicilan 1.000.000/bln</li>
						</ul>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-title">
						Pinjaman Saya
					</div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Pinjaman</th>
									<th>Nama Pinjaman</th>
									<th>Besar Pinjaman</th>
									<th>Tanggal Pengajuan</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($f as $data) { ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $data['id_pinjaman'] ?></td>
									<td><?php echo $data['nama_pinjaman'] ?></td>
									<td><?php echo $data['besar_pinjaman'] ?></td>
									<td><?php echo $data['tgl_pengajuan_pinjam'] ?></td>
									<?php if ($data['ket_acc'] == 'BELUM ACC') { ?>
									<td><button class="btn btn-block btn-warning"><?php echo $data['ket_acc'] ?></button></td>
									<?php }?>
									<?php if ($data['ket_acc'] == 'ACC') { ?>
									<td><button class="btn btn-block btn-success"><?php echo $data['ket_acc'] ?></button></td>
									<?php }?>
									<?php if ($data['ket_acc'] == 'TIDAK ACC') { ?>
									<td><button class="btn btn-block btn-danger"><?php echo $data['ket_acc'] ?></button></td>
									<?php }?>
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



<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>
<?php }else{?>
<script type="text/javascript">window.location='index.php'</script>
<?php }?>