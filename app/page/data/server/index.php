<div class="content">
	<div class="page-header">
		<h1 class="title">Server Information</h1>
		<ol class="breadcrumb">
			<li class="active">Semua Tentang informasi Server</li>
		</ol>
	</div>

	<div class="container-default">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Information Server
						</div>
						<div class="panel-body">
							<table class="table info-sign">
								<tr>
									<td>System Host</td>
									<td><?php echo $_SERVER['HTTP_HOST']  ?></td>
								</tr>
								<tr>
									<td>Http User Agent</td>
									<td><?php echo $_SERVER['HTTP_USER_AGENT'] ?></td>
								</tr>
								<tr>
									<td>Data Accept</td>
									<td><?php echo $_SERVER['HTTP_ACCEPT'] ?></td>
								</tr>
								<tr>
									<td>Languange</td>
									<td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?></td>
								</tr>
								<tr>
									<td>Webserver used</td>
									<td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
								</tr>
								<tr>
									<td>Server Name</td>
									<td><?php echo $_SERVER['SERVER_NAME'] ?></td>
								</tr>
								<tr>
									<td>Port</td>
									<td><?php echo $_SERVER['SERVER_PORT'] ?></td>
								</tr>
								<tr>
									<td>Remote Port</td>
									<td><?php echo $_SERVER['REMOTE_PORT'] ?></td>
								</tr>
								<tr>
									<td>Server Protocol</td>
									<td><?php echo $_SERVER['SERVER_PROTOCOL'] ?></td>
								</tr>
								<tr>
									<td>Request Method</td>
									<td><?php echo $_SERVER['REQUEST_METHOD'] ?></td>
								</tr>
								<tr>
									<td>Php Version</td>
									<td><?php echo system('php --version') ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
	</div>
	