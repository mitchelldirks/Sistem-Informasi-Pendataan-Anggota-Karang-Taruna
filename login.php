<?php 
  @session_start();
  include 'admin/config/connection.php';
 
  if (isset($_POST['sigin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * from user where password='$pass' and username='$user'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
      if ($data['level'] > 0) {
        $logged=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from jabatan where id='".$data['level']."'"));
        $img=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from anggota where NIK='".$data['username']."'"));
        $_SESSION['logged'] = $logged['nama_jabatan'];
        $_SESSION['level'] = $logged['nama_jabatan'];
      }else{
        $_SESSION['logged'] = null;
      }
      $_SESSION['last']= $data['last_activity'];
      $_SESSION['id_user'] = $data['id_user'];
      $_SESSION['name'] = $data['nama'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['img'] = $img['img'];
      $_SESSION['NIK'] = $img['NIK'];
      
      if ($_SESSION['level']=='admin' || $_SESSION['level']=='Admin'  || $_SESSION['level']=='Humas' || $_SESSION['level']=='humas') {
        //header('location: admin/index.php');
        echo "<script>alert('Login berhasil!');window.location.href='admin/index.php'</script>";
      }else{
        echo "<script>alert('Anda tidak memiliki akses disini!');window.location.href='index.php'</script>";
      }
        
    }
     else {
        echo "<script>alert('Username atau Password salah!')</script>";
    }
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin View</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="admin/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="admin/assets/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-box-body">
    <div class="login-logo">
      <img src="img/logo.png" width="100px"><br>
    </div>
    <h3 class="text-center">Karang Taruna<br><small>Ujung Menteng</small></h3>
    <br>
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="sigin">Sign In</button>
          <div class="" style="margin-top: 10px;">
            <a href="index.php">Kembali ke Halaman utama</a>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
