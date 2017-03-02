<?php
	
	session_start();

	$nms = $_POST['nms'];
	$id  = $_SESSION['AKUN']['id_anggota'];
	$val = $_POST['val'];

	$x = new simpanan($db);
	$f = $x -> add($nms,$id,$val);

	if ($f) 
	{
		echo "<script>window.location='index.php?page=anggota/simpanan'</script>";
	}
	else
	{
		echo "<script>window.location='index.php?page=anggota/simpanan'</script>";
	}