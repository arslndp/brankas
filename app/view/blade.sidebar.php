<?php
  $x = new anggota($db);
  $cA = $x -> count();

  $j = new pinjaman($db);
  $countPnjm = $j -> countPinjamanNA();

?>

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN</li>
  <?php if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') { ?>
  <li><a href="index.php"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard</a></li>
  <li><a href="index.php?page=data/anggota/list"><span class="icon color6"><i class="fa fa-users"></i></span>Anggota<span class="label label-default"><?php echo $cA; ?></span></a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-money"></i></span>Data<span class="caret"></span></a>
    <ul>
      <li><a href="index.php?page=data/anggota/pinjaman">Pinjaman<span class="label label-default"><?php echo $countPnjm ?></span></a></li>
      <li><a href="index.php?page=data/anggota/angsuran">Angsuran</a></li>
      <li><a href="index.php?page=data/anggota/simpanan">Simpanan</a></li>
    </ul>
  </li>
  <li><a href="index.php?page=data/server"><span class="icon color7"><i class="fa fa-info-circle"></i></span>Info Server</a></li>
  <div class="sidebar-plan">
  User 
  <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
  </div>
</div>
<span class="space">42 GB / 100 GB</span>
</div>
<?php }
else{
?>
<li><a href="index.php"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard</a></li>
<li><a href="index.php?page=anggota/simpanan"><span class="icon color5"><i class="fa fa-money"></i></span>Simpanan</a></li>
<li><a href="index.php?page=anggota/pinjaman"><span class="icon color5"><i class="fa fa-money"></i></span>Pinjaman</a></li>
<li><a href="index.php?page=anggota/angsuran"><span class="icon color5"><i class="fa fa-money"></i></span>Angsuran</a></li>
<li><a href="index.php?page=anggota/profile"><span class="icon color5"><i class="fa fa-home"></i></span>Profile <?php echo $_SESSION['AKUN']['username'] ?></a></li>
<?php }?>
</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 
