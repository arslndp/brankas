<?php 
session_start();
if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') {
?>
<?php 
$no = 1;
$x = new pinjaman($db);
$f = $x -> fetchPinjaman();

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
				<div class="panel panel-default">
					<div class="panel-title">
						Data Peminjam
					</div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Peminjam</th>
									<th>Nama Pinjaman</th>
									<th>Besar Pinjaman</th>
									<th>Tanggal Pengajuan Pinjam</th>
									<th>Keterangan Pinjaman</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($f as $data) {	?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $data['nama'] ?></td>
									<td><?php echo $data['nama_pinjaman'] ?></td>
									<td><?php echo $data['besar_pinjaman'] ?></td>
									<td><?php echo $data['tgl_pengajuan_pinjam'] ?></td>
									<td><?php echo $data['ket_acc'] ?></td>
									<?php if ($data['ket_acc'] == 'TIDAK ACC') { ?>
									<td><button class="btn btn-block btn-danger">&times;</button></td>
									<?php }?>
									<?php if ($data['ket_acc'] == 'ACC') { ?>
									<td><button class="btn btn-block btn-success"><i class="fa fa-check"></i></button></td>
									<?php }?>
									<?php if ($data['ket_acc'] == 'BELUM ACC') { ?>
									<td><a href="index.php?action=TolakPinjaman&amp;p=<?php echo base64_encode($data['id_pinjaman']) ?>"><button class="btn btn-danger"><i class="fa fa-close"></i></button></a> <a href="index.php?action=SetujuPinjaman&amp;p=<?php echo base64_encode($data['id_pinjaman']) ?>"><button class="btn btn-success"><i class="fa fa-check"></i></button></a></td>
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