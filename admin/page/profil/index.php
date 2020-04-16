<?php 
  $NIK=$_SESSION['NIK'];
  $edit=mysqli_fetch_array(mysqli_query($con,"SELECT * from anggota join jabatan on anggota.jabatan=jabatan.id where anggota.NIK = '".$NIK."'"));

 ?>
<style type="text/css">
	.profil-input{
		margin: 10px;
		margin-left: 30px;
		padding-left: 10px;
		background: none;
		border: none;
		border-bottom: 2px solid lightblue;
		width: 100%;
	}
	strong{
		text-align: right;
	}
</style>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Profil <?=$_SESSION['name']?></h3>
          <span class="pull-right"><a href="?p=profil&act=edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a></span>
          <hr>
          <br>
          <div class="col-lg-12 row mb-2 mt-2">
          	<div class="col-md-6">
          		<img style="border-radius: 50%; height: 250px" src="assets/img/anggota/<?=$_SESSION['img']?>" class="user-image">
          	</div>
          	<div class="col-md-6">
          		<table>
          			<tr>
          				<td><strong>NIK</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['NIK']?>" class="profil-input" maxlength="16" minlength="16">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>Nama</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['nama_anggota']?>" class="profil-input">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>TTL</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['tempatlahir']?>, <?=$edit['tanggallahir']?>" class="profil-input">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>Telp</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['tel']?>" class="profil-input">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>E-mail</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['email']?>" class="profil-input">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>Telp</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['tel']?>" class="profil-input">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>Jabatan</strong></td>
          				<td>
          					<input required disabled type="text" value="<?=$edit['nama_jabatan']?>" class="profil-input">
          				</td>
          			</tr>
          			<tr>
          				<td><strong>Alamat</strong></td>
          				<td>
          					<textarea disabled class="profil-input"><?=$edit['alamat']?>, RT <?=$edit['rt']?>, RW <?=$edit['rw']?></textarea>
          				</td>
          			</tr>
          		</table>
          	</div>

          </div>

        </div>
      </div>
    </div>
</div>