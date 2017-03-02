<?php 
session_start();
if ($_SESSION['AKUN']['type_user'] == 'ANGOTA') {
?>
<div class="content">
	<div class="page-header">
		<h2 class="title">Profile <?php echo $_SESSION['AKUN']['username'] ?></h2>
		<ol class="breadcrumb">
			<li class="active">profile</li>
		</ol>
	</div>

	<div class="container-default">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo $_SESSION['AKUN']['username'] ?>
					</div>
					<div class="panel-body">
						<table class="table info-sign">
							<tr>
								<td>Nama</td>
								<td><?php echo $_SESSION['AKUN']['nama'] ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }else{?>
<script type="text/javascript">window.location='index.php'</script>
<?php }?>