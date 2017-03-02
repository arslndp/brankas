<?php

session_start();

$u = $_POST['u'];

$p = $_POST['p'];

$x = new akun($db);
$l = $x -> login($u,$p);

if($_SESSION['AKUN'])
{
	echo "<script>window.location='index.php'</script>";
}
else
{
	echo "<script>window.location='login.php'</script>";
}