
<?php 

  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE from rt where id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=domisili'</script>";
    } else {
      echo mysqli_error($con);
    }
  }

 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">domisili Penilaian</h3>
          <h3 class="box-title pull-right" >
            <a style="width: 120px" href="?p=domisili&act=create&dom=RW" class="btn btn-success"><i class="fa fa-map"></i> Tambah RW</a><br><br>
            <a style="width: 120px" href="?p=domisili&act=create&dom=RT" class="btn btn-primary"><i class="fa fa-map"></i> Tambah RT</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th hidden>#</th>
              <th>RW</th>
              <th>RT</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            	<?php 
                $no=0;
            		$sql = "SELECT * from rt order by rw, rt";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
                  $idj=$row['id'];
            	 ?>
            	 <tr>
            	 	<td hidden><?=$no?></td>
                <td><?=$row['rw']?></td>
                <td><?=$row['rt']?></td>
                <td>
                  <a href="index.php?p=domisili&act=edit&id=<?= $row['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  <a href="index.php?p=domisili&delete&id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
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