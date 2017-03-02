<?php
	$nms = $_POST['nms'];
	$id  = $_POST['id'];
	$val = $_POST['val'];
	$ket = $_POST['ket'];

	$x = new simpanan($db);
	$f = $x -> add($nms,$id,$val,$ket);

	if ($f) 
	{
		echo "<script>window.location='index.php?page=anggota/simpanan'</script>";
	}
	else
	{
		echo "<script>window.location='index.php?page=anggota/simpanan'</script>";
	}