<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEPANEL -->
<div role="tabpanel" class="sidepanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#today" aria-controls="today" role="tab" data-toggle="tab">AKUN</a></li>
    <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">INFO</a></li>
    <li role="presentation"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">CHAT</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- Start Today -->
    <div role="tabpanel" class="tab-pane active" id="today">

      <div class="sidepanel-m-title">
        Logged as <?php echo $_SESSION['AKUN']['username'] ?>
        <span class="left-icon"><a href="#"><i class="fa fa-refresh"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-file-o"></i></a></span>
      </div>

      <div class="gn-title">account action</div>

      <ul class="todo-list">
        <li class="checkbox checkbox-primary">
          <i class="fa fa-user"></i> <a href="Logout" class="link">Profile</a>
        </li>
        
        <li class="checkbox checkbox-primary">
          <i class="fa fa-arrow-right"></i> <a href="index.php?action=logout">Logout</a>
        </li>
      </ul>

    </div>
    <!-- End Today -->

    <!-- Start Tasks -->
    <div role="tabpanel" class="tab-pane" id="tasks">

      <div class="sidepanel-m-title">
        Akun Information
        <span class="left-icon"><a href="#"><i class="fa fa-user"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-info-circle"></i></a></span>
      </div>

      <div class="gn-title">Basic information</div>

      <ul class="todo-list">
        <table class="table info-sign">
          <tr>
            <td>Nama</td>
            <td> : <?php echo $_SESSION['AKUN']['username'] ?></td>
          </tr>
          <tr>
            <td>Type User</td>
            <td> : <?php echo $_SESSION['AKUN']['type_user'] ?></td>
          </tr>
        </table>
      </ul>

      <div class="gn-title">Tips of the day</div>
      <ul class="todo-list">
        <li class="checkbox checkbox-warning">
          jangan Pernah Memberikan data login akun anda
        </li>
        
        <li class="checkbox checkbox-success">
          untuk masalah keamanan maka setiap admin yg telah di berikan akun harus mengganti password secara default
        </li>
        
        <li class="checkbox checkbox-info">
          <?php echo date("Y-m-d H:i:s") ?>
        </li>

      </ul>
    </div>    
    <!-- End Tasks -->

    <!-- Start Chat -->
    <div role="tabpanel" class="tab-pane" id="chat">

      <div class="sidepanel-m-title">
        Action
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>


    </div>
    <!-- End Chat -->

  </div>

</div>
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 
