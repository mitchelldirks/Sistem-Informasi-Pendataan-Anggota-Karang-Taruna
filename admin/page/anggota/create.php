<?php 
  if (isset($_POST['simpan'])) {

      $a=$_FILES['photo']['name'];
      $query="INSERT INTO anggota values ('".$_POST['NIK']."','".$_POST['nama']."','".$_POST['pob']."','".$_POST['dob']."','".$_POST['tel']."','".$_POST['email']."','".$_POST['alamat']."','".$_POST['rw']."','".$_POST['rt']."','".$a."','".$_POST['jab']."')";
      $sql=mysqli_query($con,$query);
    if ($sql) {
        

        if (strlen($a)>0) {
            if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
              move_uploaded_file($_FILES['photo']['tmp_name'], "assets/img/anggota/".$a);
              //$img=",img='".$_POST['photo']."'";
              $img=",img='".$a."'";
            }
          //}
    }else{
      $img="";
    }
      $inputuser="INSERT INTO user values (null,'".$_POST['nama']."','".$_POST['NIK']."','".$_POST['NIK']."','".$_POST['jab']."',null)";
      mysqli_query($con,$inputuser);
      //echo $inputuser;
      echo "<script>alert('Data berhasil ditambah!');window.location.href='index.php?p=anggota'</script>";
    }else{
      echo "<script>alert('Penambahan data gagal!');window.location.href='index.php?p=anggota'</script>";
    }
  }

 ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form input anggota baru</h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post"  enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Anggota Baru</label>
              <input required type="text" name="nama" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <select required name="jab" class="form-control custom-select">
                <option disabled selected>-- Pilih Jabatan --</option>
                <?php $query=mysqli_query($con,"SELECT * FROM jabatan order by id");
                while ($jab=mysqli_fetch_array($query)) {?>
                  <option value="<?=$jab['id']?>"><?=$jab['nama_jabatan']?></option>
                 <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">NIK</label>
              <input required type="text" name="NIK" class="form-control input-lg" maxlength="16" minlength="16">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tempat Lahir</label>
              <input required type="text" name="pob" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Lahir</label>
              <input required type="date" name="dob" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No. Telp / WA</label>
              <input required type="tel" name="tel" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input required type="email" name="email" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <textarea required name="alamat" placeholder="Masukan Job Description" class="form-control input-lg" id="exampleInputEmail1"></textarea>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">RW</label>
                  <select required id="rw" name="rw" class="form-control input-lg">
                    <option selected disabled>-- Pilih RW --</option>
                    <?php $RW=mysqli_query($con,"SELECT * from rw order by rw");
                     while ($rw=mysqli_fetch_array($RW)) {?>
                      <option value="<?=$rw['rw']?>"><?=$rw['rw']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">RT</label>
                  <select required id="rt" name="rt" class="form-control custom-select input-lg">
                    <option selected disabled>-- Pilih RT --</option>
                    <?php 
                    $RW=mysqli_query($con,"SELECT * from rw order by rw");
                     while ($rw=mysqli_fetch_array($RW)) {
                    $RT=mysqli_query($con,"SELECT * from rt where rw='".$rw['rw']."' order by rt");
                     while ($rt=mysqli_fetch_array($RT)) {?>
                      <option data-chained="<?=$rw['rw']?>" value="<?=$rt['rt']?>"><?=$rt['rt']?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Pas Foto</label>
              <input required type="file" accept="image/*" name="photo" class="form-control input-lg">
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

  <script type="text/javascript" src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="assets/plugins/jQuery/data-chained.js"></script>
  <script type="text/javascript">
    $("#rt").chained("#rw");
  </script>
