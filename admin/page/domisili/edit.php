<?php 
  if (isset($_POST['simpan'])) {
    $NJ=$_POST['NJ'];
    $JD=$_POST['JD'];
    $id=$_POST['id'];
    $update=mysqli_query($con,"UPDATE domisili set nama_domisili = '$NJ', job_desc='$JD' where id='$id'");
        if ($update) {
      echo "<script>alert('Data ".$label." Berhasil Diubah!');window.location.href='index.php?p=domisili'</script>";
        }else{
      echo "<script>alert('Data ".$label." Gagal dieksekusi!');window.location.href='index.php?p=domisili&act=edit&id=".$_GET['id']."'</script>";
        }
  }
$edit=mysqli_fetch_array(mysqli_query($con,"SELECT * from rt where id = '".$_GET['id']."'"));


 ?>
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
                  <select required id="rw" name="rw" class="form-control input-lg">
                    <option selected disabled>-- Pilih RW --</option>
                    <?php $RW=mysqli_query($con,"SELECT * from rw order by rw");
                     while ($rw=mysqli_fetch_array($RW)) {?>
                      <option <?php if ($edit['rw']==$rw['rw']){echo "selected";} ?> value="<?=$rw['rw']?>"><?=$rw['rw']?></option>
                    <?php } ?>
                  </select>
                </div>
            <div class="form-group">
              <label for="exampleInputEmail1">RT</label>
              <input type="text" name="rt" value="<?=$edit['rt']?>" class="form-control input-lg">
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