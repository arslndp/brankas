<?php 

$p = base64_decode($_GET['p']);

$x = new simpanan($db);
$f = $x -> acc($p);

if ($f) {
	echo "<script>window.location='index.php?page=data/anggota/simpanan'</script>";
}else{
	echo "<script>window.location='index.php?page=data/anggota/simpanan'</script>";
}
