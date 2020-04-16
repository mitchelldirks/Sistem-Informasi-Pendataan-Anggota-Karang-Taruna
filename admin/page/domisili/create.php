<?php 

switch ($_GET['dom']) {
  case 'RW':
    if (isset($_POST['simpan'])) {
    $RW=$_POST['rw'];
      $cekagy=mysqli_query($con,"SELECT * from rw where rw='".$RW."'");
      if (mysqli_num_rows($cekagy) > 0) {
        echo "<script>alert('Data ".$RW." Sudah Tersedia!');window.location.href='index.php?p=domisili'</script>";
      }else{
        $input=mysqli_query($con,"INSERT INTO rw values ('$RW')");
        if ($input == TRUE) {
          echo "<script>alert('Data ".$RW." Berhasil Ditambahkan!');window.location.href='index.php?p=domisili'</script>";
        }else{
          echo "<script>alert('Data ".$RW." Gagal dieksekusi!');window.location.href='index.php?p=domisili&act=create'</script>";
        }
      }
  }?>
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form input RW</h3>     
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">RW</label>
              <input type="text" name="rw" class="form-control input-lg">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <?php
    break;

  case 'RT':
    if (isset($_POST['simpan'])) {
    $RW=$_POST['rw'];
    $RT=$_POST['rt'];
      $cekagy=mysqli_query($con,"SELECT * from rt where rw='".$RW."' and rt='".$RT."'");
      if (mysqli_num_rows($cekagy) > 0) {
        echo "<script>alert('Data ".$RT." Sudah Tersedia!');window.location.href='index.php?p=domisili'</script>";
      }else{
        $input=mysqli_query($con,"INSERT INTO rt values (null,'$RT','$RW')");
        if ($input === TRUE) {
          echo "<script>alert('Data ".$RT." Berhasil Ditambahkan!');window.location.href='index.php?p=domisili'</script>";
        }else{
          echo "<script>alert('Data ".$RT." Gagal dieksekusi!');window.location.href='index.php?p=domisili&act=create'</script>";
        }
      }
  }?>

  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form input RT</h3>     
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">RW</label>
              <select class="form-control custom-select" name="rw">
                <?php $query=mysqli_query($con,"SELECT * from rw order by rw");
                  while ($row=mysqli_fetch_array($query)) { ?>
                  <option value="<?=$row['rw']?>"><?=$row['rw']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">RT</label>
              <input type="text" name="rt" class="form-control input-lg">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>

  <?php
    break;
  
  default:
    include 'page/domisili/index.php';
    break;
}

 ?>