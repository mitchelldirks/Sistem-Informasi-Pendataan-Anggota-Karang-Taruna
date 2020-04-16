<?php  include '../../config/connection.php';
if (isset($_GET['rt']) and isset($_GET['rw'])) {
                  $sql = "SELECT * from anggota where rw='".$_GET['rw']."' and rt='".$_GET['rt']."' order by nama_anggota";
                  $title="RW ".$_GET['rw']." RT ".$_GET['rt'];
                }else{
                  $sql = "SELECT * from anggota order by nama_anggota";
                  $title="";
                }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Anggota Karang Taruna Ujung Menteng</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
</head>
<body>
	<div class="header col-md-12 row" style="margin: 10px 10px 10px 0; border-bottom: solid black 2px;">
		<div class="col-md-2"><img src="../../../img/logo.png" width="150px"></div>
		<div class="col-md-8 text-center ">
			<h2 class="text-primary"><strong>Karang Taruna Ujung Menteng</strong></h2>
			<h1 style="margin-top:-15px;font-family: times new roman;"><strong>Secondary Text Title</strong></h1>
			<p >Jalan Raya Bekasi Timur KM. 17 No. 21 RT 04 RW 01, Klender, Jatinegara Kaum, Pulogadung, Jakarta Timur 13470. No. Telp/FAX (021) 4754431</p>
		</div>
		<div class="col-md-2">
			<!-- <button style="margin-top: 30px;" onclick="print()" class="btn btn-primary no-print d-print-none pull-right"><i class="fa fa-print"></i></button> -->
		</div>
	</div>
	<div class="title col-md-12 row" style="padding:10px; font-family: times new roman;">
		<div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			<h3><strong>Anggota Karang Taruna Ujung Menteng<br><?=$title?></strong></h3>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
	<div class="content col-md-12" style="padding:4px; font-family: times new roman;">
		
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
            </tr>
            </thead>
            <tbody>
            	<?php 
                $no=0;
                
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
                    <div class="col-lg-8">
                      <?= $row['nama_anggota'] ?>
                    </div>
                    <div class="col-lg-4">
                      <img width="50px" src="../../assets/img/anggota/<?=$row['img']?>" title="<?php 
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
                
            	 </tr>
            	<?php endwhile; ?>
            </tbody>
          </table>

	</div>


</body>
<script type="text/javascript">window.print()</script>
</html>