<?php 
	@session_start();
  //error_reporting(0);
	include 'config/connection.php';
  
	if (isset($_SESSION['username'])) {}else{header('Location:../login.php');}
  if ($_SESSION['id_user'] == null) {
    echo "<script>alert('Harap login terlebih dahulu');window.location.href='../login.php'</script>";
  }
  if (isset($_GET['logout'])) {
    mysqli_query($con,"UPDATE user set last_activity = null where id_user='".$_SESSION["id_user"]."'");
    session_destroy();
    header('Location: ../login.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php
  if (isset($_GET["p"])) {
    echo $_SESSION["level"]." | ".$_GET["p"]." | ";
  }else{
    echo $_SESSION["level"]." | "."Dashboard | ";
  }
  echo $_SESSION["username"]; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  <style type="text/css">
    .atas{
      color: white;
    }
    .wrapper{
      height: 90%;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../img/logo.png" width="40px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../img/logo.png" width="40px"> Ujung Menteng</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <?php if ($_SESSION['level']=='admin' || $_SESSION['level']=='Admin'  || $_SESSION['level']=='Humas' || $_SESSION['level']=='humas'): ?>
            <li><a class="dropdown-item" href="?p=anggota">Data anggota</a></li>
          <?php endif ?>
          <?php if (@$_SESSION['level'] == null):?>
            <li class="dropdown user user-menu">
            <a href="login.php" >
              <span class="hidden-xs">Login</span>
            </a>
          </li>
          <?php endif ?>
          <?php if (isset($_SESSION['username'])): ?>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu" title="<?= $_SESSION['name'] ?>">
              <img src="assets/img/anggota/<?=$_SESSION['img']?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu" style="width: 100px">

              <!-- <a class="dropdown-item" href="#" style="margin: 10px;font-size: 20px">Identitas</a>
              <br> -->
              <a class="dropdown-item pull-left" style="margin: 10px; color: black"> <i class="fa fa-clock-o"></i>
                Last Active <br><small><?=$_SESSION['last']?></small>
              </a>
              
              <a class="dropdown-item pull-left" href="?p=change" style="margin: 10px; "><i class="fa fa-lock"></i> Change Password </a>
              <a class="dropdown-item pull-left" href="?logout" style="color: red;margin: 10px;"><i class="fa fa-circle-o text-red"></i> Logout </a>
              
            </div>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= (@$_GET['p']=='')?'active':'' ?>">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?= (@$_GET['p']=='profil')?'active':'' ?>">
          <a href="?p=profil">
            <i class="fa fa-user-secret"></i> <span>Profil</span>
          </a>
        </li>
        <?php if ($_SESSION['level']=='humas' || $_SESSION['level']=='Humas'): ?>
          <li class="treeview <?= (@$_GET['p']=='anggota')?'active':'' ?>">
            <a href="?p=anggota">
              <i class="fa fa-user"></i> <span>Anggota</span>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['level']=='admin' || $_SESSION['level']=='Admin'): ?>
          <li hidden> class="treeview <?= (@$_GET['p']=='user')?'active':'' ?>">
            <a href="?p=user">
              <i class="fa fa-user"></i> <span>User</span>
            </a>
          </li>
          <li class="treeview <?= (@$_GET['p']=='anggota')?'active':'' ?>">
            <a href="?p=anggota">
              <i class="fa fa-user"></i> <span>Anggota</span>
            </a>
          </li>
          <li class="treeview <?= (@$_GET['p']=='kegiatan')?'active':'' ?>">
            <a href="?p=kegiatan">
              <i class="fa fa-clock-o"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li class="treeview <?= (@$_GET['p']=='peminjaman')?'active':'' ?>">
            <a href="?p=peminjaman">
              <i class="fa fa-calendar"></i> <span>Peminjaman</span>
            </a>
          </li>
          <li class="treeview <?= (@$_GET['p']=='jabatan'||$_GET['p']=='domisili')?'active':'' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li style="padding-left: 1.5em"><a href="?p=jabatan">Jabatan<span class="pull-right-container"><i class="fa fa-briefcase pull-right"></i></span></a></li>
              <li style="padding-left: 1.5em"><a href="?p=domisili">Domisili<span class="pull-right-container"><i class="fa fa-map pull-right"></i></span></a></li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if (@$_SESSION['logged'] == true): ?>
          <li class="header">OTHER</li>
          <li><a href="?logout"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <section class="content">
        
        <?php 

          $page = @$_GET['p'];
          $action = @$_GET['act'];

          switch ($page) {
            case 'change':
              include 'page/changepass.php';
              break;

            case 'user':
              if ($action == "create") {
                include 'page/user/create.php';
              } else if ($action == "edit") {
                include 'page/user/edit.php';
              } else {
                include 'page/user/index.php';
              }
              break;
            
            case 'profile':
              include 'page/anggota/profile.php';
              break;

            case 'anggota':
              if ($action == "create") {
                include 'page/anggota/create.php';
              }else if ($action == "edit") {
                include 'page/anggota/edit.php';
              }else if ($action == "upload") {
                include 'page/anggota/upload.php';
              }else if ($action == "print") {
                // if (isset($_GET['rt']) and isset($_GET['rw'])) {
                //   $link='location: page/anggota/print.php?rt='.$_GET['rt'].'&rw='.$_GET['rw'];
                // }else{
                //  $link='location: page/anggota/print.php';
                // }
                // header($link);
                include 'page/anggota/print.php';
              } else {
                include 'page/anggota/index.php';
              }
              break;

              case 'kegiatan':
              if ($action == "create") {
                include 'page/kegiatan/create.php';
              }else if ($action == "edit") {
                include 'page/kegiatan/edit.php';
              }else if ($action == "upload") {
                include 'page/kegiatan/upload.php';
              }else if ($action == "status") {
                mysqli_query($con,"UPDATE kegiatan SET status='Reserved' where id_kegiatan='".$_GET["id"]."'");
                echo "<script>alert('Status kegiatan telah menjadi Reserved');window.location.href='index.php?p=kegiatan'</script>";
                //header("location: index.php?p=kegiatan");
              } else {
                include 'page/kegiatan/index.php';
              }
              break;

             case 'peminjaman':
              if ($action == "create") {
                include 'page/peminjaman/create.php';
              }else if ($action == "edit") {
                include 'page/peminjaman/edit.php';
              }else if ($action == "upload") {
                include 'page/peminjaman/upload.php';
              }else if ($action == "status") {
                mysqli_query($con,"UPDATE peminjaman SET status='Reserved' where id_peminjaman='".$_GET["id"]."'");
                echo "<script>alert('Status peminjaman telah menjadi Reserved');window.location.href='index.php?p=peminjaman'</script>";
                //header("location: index.php?p=peminjaman");
              } else {
                include 'page/peminjaman/index.php';
              }
              break;

            case 'jabatan':
              if ($action == "create") {
                include 'page/jabatan/create.php';
              }else if ($action == "edit") {
                include 'page/jabatan/edit.php';
              }else{
                include 'page/jabatan/index.php';
              }
              break;

            case 'profil':
              if ($action == "create") {
                include 'page/profil/create.php';
              }else if ($action == "edit") {
                include 'page/profil/edit.php';
              }else{
                include 'page/profil/index.php';
              }
              break;

            case 'domisili':
              if ($action == "create") {
                include 'page/domisili/create.php';
              }else if ($action == "edit") {
                include 'page/domisili/edit.php';
              }else{
                include 'page/domisili/index.php';
              }
              break;

            default:
              include 'page/dashboard.php';
              break;
          }

         ?>      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->
  <footer class="main-footer no-print d-print-none">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.2
    </div>
    <strong>Copyright &copy; <?=date("Y")?> <a href="https://github.com/pottsed">Pottsed</a></strong> All rights reserved.
  </footer>

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
