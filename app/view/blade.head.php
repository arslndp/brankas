<?php 
  session_start();
  $x = new anggota($db);
  $lA = $x -> list();

  $j = new pinjaman($db);
  $lKP = $j -> katList();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>BRANKAS - Solusi Keuangan Anda</title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo __RS_CSS__ ?>root.css" rel="stylesheet"> 


  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="<?php echo __RS_IMG__ ?>/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="index.php" class="logo">BRANKAS</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Top Menu -->
    <ul class="topmenu">
      <li><a href="#">Files</a></li>
      <li><a href="#">Authors</a></li>
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">My Files <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Videos</a></li>
          <li><a href="#">Pictures</a></li>
          <li><a href="#">Blog Posts</a></li>
        </ul>
      </li>
    </ul>
    <!-- End Top Menu -->

    <!-- Start Sidepanel Show-Hide Button -->
    <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
        <?php if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') { ?>
          <li><a href="#" data-toggle='modal' data-target='#myModal'><i class="fa falist fa-user"></i>Akun Anggota</a></li>
          <li><a href="#" data-toggle='modal' data-target='#addSmpn'><i class="fa falist fa-money"></i>Simpanan</a></li>
          <li><a href="#" data-toggle='modal' data-target='#addPinjeman'><i class="fa falist fa-money"></i>Pinjaman</a></li>
          <?php }else{ ?>
          <li><a href="#" data-toggle='modal' data-target='#addPinjeman'><i class="fa falist fa-money"></i>Ajukan Pinjaman</a></li>
          <li><a href="#" data-toggle='modal' data-target='#addAngsuran'><i class="fa falist fa-money"></i>Setor Angsuran</a></li>
          <li><a href="#" data-toggle='modal' data-target='#addSimpanan'><i class="fa falist fa-money"></i>Setor Simpanan</a></li>
          <?php }?>
        </ul>
    </li>

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?php echo __RS_IMG__ ?>/profileimg.png" alt="img"><b><?php echo $_SESSION['AKUN']['username'] ?></b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li><a href="index.php?action=logout"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php if ($_SESSION['AKUN']['type_user'] == 'PETUGAS') { ?>

<!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Add MODAL BOXES Simpanan -->

    <div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="addSmpn" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Add Simpanan</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php?action=BayarSimpanan">
                <table class="table info-sign">
                  <tr>
                    <td>Nama Simpanan</td>
                    <td>
                      <select class="form-control selectpicker" data-style='btn-default' name="nms">
                        <option value="Simpanan Wajib">Simpanan Wajib</option>
                        <option value="Simpanan Pokok">Simpanan Pokok</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Anggota</td>
                    <td>
                      <select class="form-control selectpicker" data-live-search='true' name="id">
                        <option>none</option>  
                        <?php foreach ($lA as $data) { ?>
                        <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                        <?php }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Besar Simpanan</td>
                    <td><input type="text" class="form-control form-control-line" name="val"></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><textarea class="form-control form-control-line" name="ket"></textarea></td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <input type="Submit" class="btn btn-primary" value='Save'/>
            </div></form>
          </div>
        </div>
      </div>

    </div>

<!-- END MODAL BOXES Add Simpanan -->

<!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
 <!-- MODAL BOXES  Anggota -->

    <div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="myModal" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Add Anggota</h4>
            </div>
            <div class="modal-body">
              <table class="table info-sign">
                <tr>
                  <td>Nama </td>
                  <td><input type="text" class="form-control form-control-line" name=""></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><input type="text" class="form-control form-control-line" name=""></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td>
                    <fieldset>
                      <div class="control-group">
                        <div class="controls">
                          <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" id="date-picker" class="form-control" value=""/> 
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><input type="text" class="form-control form-control-line" name=""></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>
                    <select class="selectpicker" data-style='btn-default'>
                        <option class="btn-default">none</option>
                        <option value="pria" class="btn-primary">Pria</option>
                        <option value="wanita" class="btn-danger">Wanita</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>No Handphone</td>
                  <td><input type="text" class="form-control form-control-line" name=""></td>
                </tr>
                <tr>
                  <td>Keteranag</td>
                  <td>
                    <textarea class="form-control form-control-line"></textarea>
                  </td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <button type="button" class="btn btn-primary">Add!</button>
            </div>
          </div>
        </div>
      </div>

    </div>

 <!-- END MODAL BOXES Anggota -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- MODAL BOXES PINJAMAN -->

     <div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="addPinjeman" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Add Penjaman</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php?action=TambahSimpanan">
                <table class="table info-sign">
                  <tr>
                    <td>Nama Pinjaman</td>
                    <td>
                      <input type="text" class="form-control form-control-line" name="nms">
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Anggota</td>
                    <td>
                      <select class="form-control selectpicker" data-live-search='true' name="id">
                        <option>none</option>  
                        <?php foreach ($lA as $data) { ?>
                        <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                        <?php }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Besar Pinjaman</td>
                    <td><input type="text" class="form-control form-control-line" name="val"></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><textarea class="form-control form-control-line" name="ket"></textarea></td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <input type="Submit" class="btn btn-primary" value='Save'/>
            </div></form>
          </div>
        </div>
      </div>

    </div>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- MODAL BOXES PINJAMAN -->
<?php }else{
?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Add MODAL BOXES Pengajuan Pinjaman -->

    <div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="addPinjeman" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Pengajuan Pinjaman</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php?action=AjukanPinjaman">
                <table class="table info-sign">
                  <tr>
                    <td>Nama Pinjaman</td>
                    <td>
                      <select class="form-control selectpicker" data-style='btn-default' name="nms">
                        <?php foreach ($lKP as $data) { ?>
                        <option value="<?php echo $data['nama_kategori'] ?>"><?php echo $data['nama_kategori'] ?></option>
                        <?php }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Anggota</td>
                    <td>
                      <input type="text" value="<?php echo $_SESSION['AKUN']['nama'] ?>" class='form-control form-control-line' name="" disabled='disabled'>
                    </td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <input type="Submit" class="btn btn-primary" value='Save'/>
            </div></form>
          </div>
        </div>
      </div>

    </div>

<?php 
  $x = new pinjaman($db);
  $Ac = $x -> myPinjamanACC(); 

  $fKd = $x -> myPinjamanACC();
?>
<div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="addAngsuran" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Pembayaran Angsuran</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php?action=BayarAngsuran">
                <table class="table info-sign">
                  <tr>
                    <td>Kode Pinjaman</td>
                    <td>
                      <select class="selectpicker" data-live-search='true'>
                      <?php foreach ($fKd as $data) { ?>  
                        <option value="<?php echo $data['id_pinjaman'] ?>"><?php echo $data['id_pinjaman'] ?></option>
                      <?php }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Anggota</td>
                    <td>
                      <input type="text" value="<?php echo $_SESSION['AKUN']['nama'] ?>" class='form-control form-control-line' name="" disabled='disabled'>
                    </td>
                  </tr>
                  <tr>
                  <?php
                    $jt = '10';
                  ?>
                    <td>Tanggal Jatuh Tempo <?php echo '10'.date('-M-Y') ?></td>
                    <td>Tanggal hari ini <?php if(date('d') > $jt){ echo '<button class="btn btn-block btn-danger">'.date('d-M-Y').'</button>'; }else{ echo "<button class='btn btn-block btn-success'>".date('d-M-Y')."</button>"; } ?></td>
                  </tr>
                  <tr>
                    <td>Pembayaran</td>
                    <td></td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <input type="Submit" class="btn btn-primary" value='Save'/>
            </div></form>
          </div>
        </div>
      </div>

    </div>

<div class="col-md-12 col-lg-4">
      
      <div class="modal fade" id="addSimpanan" tabindex="-1" role='dialog' aria-hidden='true'>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class="modal-title">Setor Simpanan</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="index.php?action=BayarSimpanan">
                <table class="table info-sign">
                  <tr>
                    <td>Nama Anggota</td>
                    <td>
                      <input type="text" value="<?php echo $_SESSION['AKUN']['nama'] ?>" class='form-control form-control-line' name="" disabled='disabled'>
                    </td>
                  </tr>
                  <tr>
                    <td>Besar Angsuran</td>
                    <td><input type="text" class="form-control form-control-line" name="val"></td>
                  </tr>
                  <tr>
                    <td>Nama Simpanan</td>
                    <td>
                      <select class="form-control selectpicker" data-style='btn-default' name="nms">
                        <option value="Simpanan Wajib">Simpanan Wajib</option>
                        <option value="Simpanan Pokok">Simpanan Pokok</option>
                      </select>
                    </td>
                  </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-white" data-dismiss='modal'>Close</button>
              <input type="Submit" class="btn btn-primary" value='Save'/>
            </div></form>
          </div>
        </div>
      </div>

    </div>

<!-- END MODAL BOXES Add Simpanan -->


<!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php }?>


<script type="text/javascript" src="<?php echo __RS_JS__ ?>jquery.min.js"></script>
<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="<?php echo __RS_JS__ ?>date-range-picker/daterangepicker.js"></script>
<!-- Basic Single Date Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>