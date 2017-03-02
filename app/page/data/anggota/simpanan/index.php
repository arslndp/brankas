<?php 
session_start();
if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') {
?>
<?php 
	$x = new simpanan($db);
	$l = $x -> list();
	$no = '1';
?>
<div class="content">
	<div class="page-header">
		<h1 class="title">Data Simpanan</h1>
		<ol class="breadcrumb">
			<li class="active">Data logs Simpanan</li>
		</ol>
	</div>

	<div class="container-padding">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-title">
						Data Simpanan
					</div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Nama Simpanan</th>
									<th>Tgl Simpnanan</th>
									<th>Jumlah Simpanan</th>
									<th>ket</th>
									<th>Phone</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($l as $data) {?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $data['nama'] ?></td>
									<td><?php echo $data['alamat'] ?></td>
									<td><?php echo $data['nm_simpanan'] ?></td>
									<td><?php echo $data['tgl_simpanan'] ?></td>
									<td><?php echo $data['besar_simpanan'] ?></td>
									<td><?php echo $data['ket'] ?></td>
									<td><?php echo $data['no_telp'] ?></td>
									<td>
									<?php if ($data['ket_smpn'] == 'BELUM APPROVE') { ?>
										<a href="index.php?action=TolakSimpanan&amp;p=<?php echo base64_encode($data['id_simpanan']) ?>"><button class="btn btn-danger"><i class="fa fa-close"></i></button></a>
										<a href="index.php?action=SetujuSimpanan&amp;p=<?php echo base64_encode($data['id_simpanan']) ?>"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
									<?php }?>
									<?php if ($data['ket_smpn'] == 'APPROVE') { ?>
									<button class="btn btn-block btn-success"><i class="fa fa-close"></i></button>
									<?php }?>
									<?php if ($data['ket_smpn'] == 'TIDAK APPROVE') { ?>
									<button class="btn btn-block btn-danger"><i class="fa fa-check"></i></button>
									<?php }?>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Add MODAL BOXES Simpanan -->

    <div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="editSmpn" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Edit Simpanan</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php?action=TambahSimpanan">
                <table class="table info-sign">
                  <tr>
                    <td>Nama Simpanan</td>
                    <td><input type="text" class="form-control form-control-line" name="nms"></td>
                  </tr>
                  <tr>
                    <td>Nama Anggota</td>
                    <td>
                      <select class="selectpicker" data-live-search='true' name="id">
                        <option>none</option>  
                        <?php foreach ($lA as $data) { ?>
                        <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                        <?php }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Besar Simpanan</td>
                    <td><input type="text" class="form-control form-control-line" name="val"></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><textarea class="form-control form-control-line" name="ket"></textarea></td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <input type="Submit" class="btn btn-primary" value='Save'/>
            </div></form>
          </div>
        </div>
      </div>

    </div>

<!-- END MODAL BOXES Add Simpanan -->


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