<?php
	session_start();
	
	$nms = $_POST['nms'];
	$id  = $_SESSION['AKUN']['id_anggota'];
//	$val = $_POST['val'];

	if ($nms == 'PAKET 1') {
		$val = '1.000.000';
	}

	if ($nms == 'PAKET 2') {
		$val = '2.500.000';
	}

	if ($nms == 'PAKET 3') {
		$val = '5.000.000';
	}

	if ($nms == 'PAKET 4') {
		$val = "10.000.000";
	}


	$x = new pinjaman($db);
	$f = $x -> add($nms,$id,$val);

	if ($f) 
	{
		echo "<script>window.location='index.php?page=anggota/pinjaman'</script>";
	}
	else
	{
		echo "<script>window.location='index.php?page=anggota/pinjaman'</script>";
	}