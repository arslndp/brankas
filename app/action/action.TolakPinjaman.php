<?php 

$p = base64_decode($_GET['p']);

$x = new pinjaman($db);
$f = $x -> tolak($p);

	if ($f) 
	{
		echo "<script>window.location='index.php?page=data/anggota/pinjaman'</script>";
	}
	else
	{
		echo "<script>window.location='index.php?page=data/anggota/pinjaman'</script>";
	}