<?php 

/* ---------------------------------------------------- */
	
	require 'system/lib/lib.env.php';

	require 'system/db/db.config.php';

	require 'system/action/action.akun.php';

/* ---------------------------------------------------- */


if( ! empty($_GET['action']))
{
	include 'app/action/action.'.$_GET['action'].'.php';

}elseif ($_SESSION) {
	include 'index.php';
}
else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>:: LOGIN PAGE ::</title>
	<link rel="stylesheet" type="text/css" href="app/resources/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="app/resources/css/login.css"/>
</head>
<body>
<div class="col-md-12 form">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Login
			</div>
			<div class="panel-body">
				<form method="POST" action="login.php?action=login">
					<table class="table info-sign">
						<tr>
							<td>Username</td>
							<td><input type="text" class="form-control" name="u"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" class="form-control" name="p"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-block btn-primary" value="Login!" name=""></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Registration Form
			</div>
			<div class="panel-body">
				<table class="table info-sign">
					<tr>
						<td>Nama</td>
						<td><input type="text" class="form-control" name=""></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><input type="text" class="form-control" name=""></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td><input type="text" class="form-control" name=""></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>
							<select class="form-control">
								<option>PRIA</option>
								<option>WANITA</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>No handphone</td>
						<td><input type="text" class="form-control" name=""></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" class="btn btn-block btn-success" value="Registration!" name=""></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<footer class="footer">
		<h4><b>COPYRIGHT &copy; <?php echo date("Y") ?> www.kineck.cf</b></h4>
	</footer>
</div>
</body>
</html>
<?php }?>