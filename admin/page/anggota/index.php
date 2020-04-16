<?php 
  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE from anggota where NIK='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=anggota'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>
<style type="text/css">
  .select{
    border-radius: 5px;
    border:1px solid lightblue;
    width: 99px;
  }
</style>
<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title d-print-block">Data Anggota</h3>
          <h3 class="box-title pull-right no-print d-print-none"><a href="?p=anggota&act=create" class="btn btn-success"><i class="fa fa-user"></i> Tambah Data Anggota</a></h3><br>
          <!-- <a onclick="javascript:window.print()" class="btn btn-primary no-print d-print-none"><i class="fa fa-print"></i> Print</a> -->
          <?php 
          if (isset($_GET['rt']) and isset($_GET['rw'])) {
                  $dom='&rt='.$_GET['rt'].'&rw='.$_GET['rw'];
                }else{
                 $dom='';
                }
          ?>
          <a href="page/anggota/print.php?act=print<?=$dom?>" class="btn btn-primary no-print d-print-none"><i class="fa fa-print"></i> Print</a>
          <br>
          <span class="pull-right d-print-none">
            <form method="GET">
            <label>Filter berdasarkan wilayah </label><a href="?p=anggota" class="pull-right">show all</a>
            <div class="row">
              <div class="col-lg-5">
                <input type="hidden" value="anggota" name="p">
                <div class="form-group">
                  RW <select required id="rw" name="rw" class="select pull-right input-sm">
                    <option selected disabled>- Pilih RW -</option>
                    <?php $RW=mysqli_query($con,"SELECT * from rw order by rw");
                     while ($rw=mysqli_fetch_array($RW)) {?>
                      <option value="<?=$rw['rw']?>"><?=$rw['rw']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="form-group">
                  RT <select required id="rt" name="rt" class="select pull-right input-sm">
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
              <div class="col-lg-2">
                <div class="form-group pull-right">
                  <button type="submit" title="cari" class="pull-right btn btn-info"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
          </span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>TTL</th>
              <th>No. Telp/WA</th>
              <th>E-mail</th>
              <th>Alamat</th>
              <th class="no-print d-print-none"></th>
            </tr>
            </thead>
            <tbody>
            	<?php 
                $no=0;
                if (isset($_GET['rt']) and isset($_GET['rw'])) {
                  $sql = "SELECT * from anggota where rw='".$_GET['rw']."' and rt='".$_GET['rt']."' order by nama_anggota";
                }elseif (isset($_GET['rw'])) {
                  $sql = "SELECT * from anggota where rw='".$_GET['rw']."' order by nama_anggota";
                }elseif (isset($_GET['rt'])) {
                  $sql = "SELECT * from anggota where rt='".$_GET['rt']."' order by nama_anggota";
                }else{
                  $sql = "SELECT * from anggota order by nama_anggota";
                }
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
                  $nik=$row['NIK'];
                  $ttl=$row['tempatlahir'].', '.$row['tanggallahir'];
                  if (strlen($row['alamat']) > 100){

                    $str = substr($row['alamat'], 0, 100) . '<a href="?p=anggota&act=edit&id='.$nik.'&n"> .. Read more</a>';
                  }else{
                    $str=$row['alamat'];
                  }
            	 ?>
            	 <tr>
                <td><?=$no?></td>
                <td><?= $nik ?></td>
            	 	<td>
                  <div class="row">
                    <div class="col-lg-6">
                      <?= $row['nama_anggota'] ?>
                    </div>
                    <div class="col-lg-6">
                      <img width="50px" src="assets/img/anggota/<?=$row['img']?>" title="<?php 
                      if( $row['nama_anggota']=='Pink Guy'      ||
                          $row['nama_anggota']=='pinkguy'       ||
                          $row['nama_anggota']=='Filthy Frank'  ||
                          $row['nama_anggota']=='filthy frank'  ||
                          $row['nama_anggota']=='filthyfrank'   ||
                          $row['nama_anggota']=='pink guy'      ){ 
                            echo 'Are he is Joji?';
                        }elseif($row['nama_anggota']=='Arnoldpo'){
                            echo 'Hilih kintil!';
                        }else{ 
                            echo $row['nama_anggota'];
                        } ?>">
                    </div>
                    
                  </div>
                </td>
                <td><?= $ttl ?></td>
                <td><?= $row['tel'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $str ?>, <br>RT <?=$row['rt']?>, RW <?=$row['rw']?></td>
                <td class="no-print d-print-none">
                  <a href="index.php?p=anggota&act=edit&id=<?= $row['NIK'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="index.php?p=anggota&delete&id=<?= $row['NIK'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
                </td>
            	 </tr>
            	<?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <script type="text/javascript" src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="assets/plugins/jQuery/data-chained.js"></script>
  <script type="text/javascript">
    $("#rt").chained("#rw");
  </script>