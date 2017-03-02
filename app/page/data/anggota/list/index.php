<?php 
session_start();
if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') {
?>
<div class="content">
	<div class="page-header">
		<h1 class="title">List Data Anggota</h1>
		<ol class="breadcrumb">
			<li class="active">List</li>
		</ol>
	</div>
	
	<div class="container-padding">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-title">
						Data Anggota
					</div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Tanggal Lahir</th>
									<th>Tempat Lahir</th>
									<th>Jenis Kelamin</th>
									<th>status</th>
									<th>Phone</th>
								</tr>
							</thead>
							<tbody>
							<?php
								
							?>
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