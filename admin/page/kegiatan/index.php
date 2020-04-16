<?php 

  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE from kegiatan where id_kegiatan='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=kegiatan'</script>";
    } else {
      echo mysqli_error($con);
    }
  }

 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data kegiatan</h3><h3 class="box-title pull-right"><a href="?p=kegiatan&act=create" class="btn btn-success"><i class="fa fa-calendar"></i> Tambah Data kegiatan</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama Acara</th>
              <th>Tanggal Pelaksanaan</th>
              <th>Jadwal</th>
              <th>Status</th>
              <th>Deskripsi</th>
              <th><?php //echo date('Y-m-d H:i:s');?></th>
            </tr>
            </thead>
            <tbody>
            	<?php 
                $no=0;
                $sql = "SELECT * from kegiatan  where tanggal >= '".date('Y-m-d')."' order by tanggal";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query)):
                  $no++;
                  if (strlen($row['deskripsi']) > 100){
                    $str = substr($row['deskripsi'], 0, 100) . '<a href="?p=kegiatan&act=edit&id='.$row['id_kegiatan'].'&n#editor"> .. Read more</a>';
                  }else{
                    $str=$row['deskripsi'];
                  }
                  if (strlen($row['nama_kegiatan']) > 50){
                    $title = substr($row['nama_kegiatan'], 0, 50) . '<a href="?p=kegiatan&act=edit&id='.$row['id_kegiatan'].'&n#editor"> .. Read more</a>';
                  }else{
                    $title=$row['nama_kegiatan'];
                  }
               ?>
               <tr>
                <td><?=$no?></td>
                <td width="20%"><?= $title ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                  <span class="badge badge-success" style="background: green"><?= date_format(date_create($row['mulai']),"H:i") ?></span>
                  <span class="badge badge-danger" style="background: red"><?= date_format(date_create($row['selesai']),"H:i") ?></span>
                </td>
                <td>
                  <?php 
                  if($row['status']=='Booked') {
                          if($row['tanggal']==date('Y-m-d')){//hari ini acarana?>
                            <a style="color: red" href="index.php?p=kegiatan&act=status&id=<?= $row['id_kegiatan'] ?>">Belum Dipastikan</a>
                    <?php }elseif($row['tanggal'] > date('Y-m-d')){//belon harina?>
                            <a href="index.php?p=kegiatan&act=status&id=<?= $row['id_kegiatan'] ?>"><?= $row['status'] ?></a>
                    <?php }elseif($row['tanggal'] < date('Y-m-d')) {//udah liwat?>
                            <span class="badge badge-danger" style="background: red;color: white">Dibatalkan</span>
                    <?php }
                  }elseif ($row['status']=='Reserved') {
                    if($row['tanggal']==date('Y-m-d')){//hari ini acarana?>
                            <span class="badge badge-danger" style="background: green;color: white">Berlangsung</span>
                    <?php }elseif($row['tanggal'] > date('Y-m-d')){//belon harina?>
                            <span class="badge badge-danger bg-primary" style="color: white">Terjadwal</span>
                    <?php }elseif($row['tanggal'] < date('Y-m-d')) {//udah liwat?>
                            <span class="badge badge-danger" style="background: darkblue;color: white">Terlaksana</span>
                    <?php }
                }?>
                  
                </td>
                <td><?= $str ?></td>
                <td>
                  <a href="index.php?p=kegiatan&act=edit&id=<?= $row['id_kegiatan'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="index.php?p=kegiatan&delete&id=<?= $row['id_kegiatan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
                </td>
               </tr>
              <?php endwhile; ?>
              <?php 

                $sql = "SELECT * from kegiatan  where tanggal < '".date('Y-m-d')."' order by tanggal desc";
                $query = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query)):
                  $no++;
                  if (strlen($row['deskripsi']) > 100){
                    $str = substr($row['deskripsi'], 0, 100) . '<a href="?p=kegiatan&act=edit&id='.$row['id_kegiatan'].'&n#editor"> .. Read more</a>';
                  }else{
                    $str=$row['deskripsi'];
                  }
                  if (strlen($row['nama_kegiatan']) > 50){
                    $title = substr($row['nama_kegiatan'], 0, 50) . '<a href="?p=kegiatan&act=edit&id='.$row['id_kegiatan'].'&n#editor"> .. Read more</a>';
                  }else{
                    $title=$row['nama_kegiatan'];
                  }
               ?>
               <tr>
                <td><?=$no?></td>
                <td width="20%"><?= $title ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                  <span class="badge badge-success" style="background: green"><?= date_format(date_create($row['mulai']),"H:i") ?></span>
                  <span class="badge badge-danger" style="background: red"><?= date_format(date_create($row['selesai']),"H:i") ?></span>
                </td>
                <td>
                  <?php 
                  if($row['status']=='Booked') {
                          if($row['tanggal']==date('Y-m-d')){//hari ini acarana?>
                            <a style="color: red" href="index.php?p=kegiatan&act=status&id=<?= $row['id_kegiatan'] ?>">Belum Dipastikan</a>
                    <?php }elseif($row['tanggal'] > date('Y-m-d')){//belon harina?>
                            <a href="index.php?p=kegiatan&act=status&id=<?= $row['id_kegiatan'] ?>"><?= $row['status'] ?></a>
                    <?php }elseif($row['tanggal'] < date('Y-m-d')) {//udah liwat?>
                            <span class="badge badge-danger" style="background: red;color: white">Dibatalkan</span>
                    <?php }
                  }elseif ($row['status']=='Reserved') {
                    if($row['tanggal']==date('Y-m-d')){//hari ini acarana?>
                            <span class="badge badge-danger" style="background: green;color: white">Berlangsung</span>
                    <?php }elseif($row['tanggal'] > date('Y-m-d')){//belon harina?>
                            <span class="badge badge-danger bg-primary" style="color: white">Terjadwal</span>
                    <?php }elseif($row['tanggal'] < date('Y-m-d')) {//udah liwat?>
                            <span class="badge badge-danger" style="background: darkblue;color: white">Terlaksana</span>
                    <?php }
                }?>
                  
                </td>
                <td><?= $str ?></td>
                <td>
                  <a href="index.php?p=kegiatan&act=edit&id=<?= $row['id_kegiatan'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="index.php?p=kegiatan&delete&id=<?= $row['id_kegiatan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
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