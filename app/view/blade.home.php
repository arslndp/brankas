<?php
$x = new anggota($db);
$cA = $x -> count();
?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active"><?php echo date("Y-M-D") ?></li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Data Anggota</a>
        <?php if($_SESSION['AKUN']['type_user'] == 'PETUGAS'){?>
        <a href="#" data-toggle='modal' data-target='#myModal' class="btn btn-light"><i class="fa fa-plus"></i></a>
        <a href="index.php?page=data/anggota/list" class="btn btn-light"><i class="fa fa-book"></i></a>
        <a href="index.php?action=logout" class="btn btn-light" id="topstats"><i class="fa fa-arrow-right"></i></a>
        <?php }else{ }?>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->

  <div class="container-default">
    <div class="row">
    <?php if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') { ?>
      <div class="col-md-12">
        <ul class="panel quick-menu clearfix">
          <li class="col-sm-3">
            <a href="#"><i class="fa fa-users"></i>Anggota<span class="label label-danger"><?php echo $cA; ?></span></a>
          </li>
          <li class="col-sm-3">
            <a href="#"><i class="fa fa-money"></i>Simpanan<span class="label label-danger">12</span></a>
          </li>
          <li class="col-sm-3">
            <a href=""><i class="fa fa-money"></i>Pinjaman<span class="label label-danger">12</span></a>
          </li>
          <li class="col-sm-3">
            <a href=""><i class="fa fa-info-circle"></i>Info Server</a>
          </li>
        </ul>
      </div>
      <?php }else{?>
      <?php
          $no = "1";
          $x = new pinjaman($db);
          $nA = $x -> myPinjamanBAC();
          $TA = $x -> myPinjamanTAC();
          $yA = $x -> myPinjamanACC();

          $y = new simpanan($db);
          $aS = $y -> mySimpananAc();
          $nS = $y -> mySimpananNc();
      ?>
      <div class="col-md-12">
        <div class="col-md-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              Pinajaman Belum Di Setujui
            </div>
            <div class="panel-body">
              <table class="table info-sign">
              <thead>
                <td>No</td>
                <td>Kode Pinjaman</td>
                <td>Besar Pinjaman</td>
              </thead>
              <tbody>
              <?php foreach ($nA as $data) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data['id_pinjaman'] ?></td>
                  <td><?php echo $data['besar_pinjaman'] ?></td>
                </tr>
              <?php }?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-danger">
            <div class="panel-heading">
              Pinjaman Tidak Di Setujui
            </div>
            <div class="panel-body">
              <table class="table info-sign">
              <thead>
                <td>No</td>
                <td>Kode Pinjaman</td>
                <td>Besar Pinjaman</td>
              </thead>
              <tbody>
              <?php foreach ($TA as $data) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data['id_pinjaman'] ?></td>
                  <td><?php echo $data['besar_pinjaman'] ?></td>
                </tr>
              <?php }?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              Pinjaman Di Setujui
            </div>
            <div class="panel-body">
              <table class="table info-sign">
              <thead>
                <td>No</td>
                <td>Kode Pinjaman</td>
                <td>Besar Pinjaman</td>
              </thead>
              <tbody>
              <?php foreach ($yA as $data) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data['id_pinjaman'] ?></td>
                  <td><?php echo $data['besar_pinjaman'] ?></td>
                </tr>
              <?php }?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading">
                Angsuran Saya
            </div>
            <div class="panel-body">
              <table class="table info-sign">
                <thead>
                  <th>Kode Pinjaman</th>
                  <th>Nominal</th>
                  <th>Besar Angsuran</th>
                  <th>Tanggal Setoran</th>
                  <th>Ket</th>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Simpanan approve saya
            </div>
            <div class="panel-body">
              <table class="table info-sign">
                <thead>
                  <th>No</th>
                  <th>Jenis </th>
                  <th>Kode Simpanan </th>
                  <th>Besar</th>
                </thead>
                <tbody>
                  <?php foreach ($aS as $data) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nm_simpanan'] ?></td>
                    <td><?php echo $data['id_simpanan'] ?></td>
                    <td><?php echo $data['besar_simpanan'] ?></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-danger">
            <div class="panel-heading">
              Simpanan Tidak Approve
            </div>
            <div class="panel-body">
              <table class="table info-sign">
                <thead>
                  <th>No</th>
                  <th>Jenis</th>
                  <th>Kode Simpanan</th>
                  <th>Besar</th>
                </thead>
                <tbody>
                  <?php foreach ($nS as $data) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nm_simpanan'] ?></td>
                    <td><?php echo $data['id_simpanan'] ?></td>
                    <td><?php echo $data['besar_simpanan'] ?></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php }?>
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Your are logged as <?php echo $_SESSION['AKUN']['username']; ?>
            </div>
            <div class="panel-body">
              <table class="table info-sign">
                <tr>
                  <td>Username</td>
                  <td><?php echo $_SESSION['AKUN']['username'] ?></td>
                </tr>
                <tr>
                  <td>Nama Lengkap</td>
                  <td><?php echo $_SESSION['AKUN']['nama'] ?></td>
                </tr>
                <tr>
                  <td>Tipe User</td>
                  <td><?php echo $_SESSION['AKUN']['type_user'] ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><?php echo $_SESSION['AKUN']['alamat'] ?></td>
                </tr>
                <tr>
                  <td>No Telp</td>
                  <td><?php echo $_SESSION['AKUN']['no_telp'] ?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><?php echo $_SESSION['AKUN']['tmp_lhr'] ?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><?php echo $_SESSION['AKUN']['tgl_lhr'] ?></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><?php echo $_SESSION['AKUN']['ket'] ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
