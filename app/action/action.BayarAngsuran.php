<?php

session_start();

$kd = $_POST['kd'];
$val = $_POST['val'];

$x = new angsuran($db);
$f = $x -> add($kd,$val);