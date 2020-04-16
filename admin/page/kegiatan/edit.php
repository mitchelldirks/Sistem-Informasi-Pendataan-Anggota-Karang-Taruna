<style type="text/css">

.inline-radio {
  display: flex;
  border-radius: 5px;
  overflow: hidden;
  border: 1px solid #b6b6b6;
}

.inline-radio  div {
    position: relative;
    flex: 1;
  }

.inline-radio  input {
    width: 100%;
    height: 60px;
    opacity: 0;
  }

.inline-radio  label {
    position: absolute;
    top: 0; left: 0;
    color: #666;
    width: 100%;
    height: 100%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
    border-right: 1px solid #b6b6b6;
  }

.inline-radio  div:last-child label {
    border-right: 0;
  }

.inline-radio  input:checked + label {
    background: #3C8DBC;
    font-weight: 500;
    color: #fff;
  }

</style>

<?php 
  $id=$_GET['id'];
  $edit=mysqli_fetch_array(mysqli_query($con,"SELECT * from kegiatan where id_kegiatan='$id'"));
  if (isset($_POST['simpan'])) {
    $query="UPDATE kegiatan SET nama_kegiatan='".$_POST['nama']."',tanggal='".$_POST['tanggal']."',mulai='".$_POST['mulai']."',selesai='".$_POST['selesai']."',deskripsi='".$_POST['deskripsi']."',privasi='".$_POST['privasi']."',NIK='".$_POST['NIK']."' where id_kegiatan='".$id."'";
    $sql=mysqli_query($con,$query);
    if ($sql) {
      echo "<script>alert('Pengubahan data berhasil!');window.location.href='index.php?p=kegiatan'</script>";
    }else{
      echo "<script>alert('Pengubahan data gagal!');window.location.href='index.php?p=kegiatan'</script>";
    }
  }

 ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form input kegiatan baru</h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama kegiatan Baru</label>
              <input required type="text" name="nama" value="<?php echo $edit['nama_kegiatan'];?>" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Pelaksanaan</label>
              <input required type="date" min="<?php echo $edit['tanggal'];?>" value="<?php echo $edit['tanggal'];?>" name="tanggal" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Waktu Mulai</label>
              <input required type="time" name="mulai" value="<?php echo $edit['mulai'];?>" format="HH:mm" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Waktu Selesai</label>
              <input required type="time" name="selesai" format="HH:mm" value="<?php echo $edit['selesai'];?>" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label>Penyelenggara</label>
              <group class="inline-radio">
                <div><input type="radio" name="privasi" value="internal" <?php if ($edit['privasi']=='Internal') { echo "checked"; } ?>><label>Internal</label></div>
                <div><input type="radio" name="privasi" value="Eksternal" <?php if ($edit['privasi']=='Eksternal') { echo "checked"; } ?>><label>Eksternal</label></div>
              </group>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Penanggung Jawab</label>
              <select required name="NIK" class="form-control custom-select input-lg">
                <option disabled selected>-- Beban Penanggungjawab --</option>
                <?php $query=mysqli_query($con,"SELECT * FROM anggota order by NIK");
                while ($jab=mysqli_fetch_array($query)) {?>
                  <option <?php
                  if ($edit['NIK']==$jab['NIK']) {
                    echo "selected";
                  }else{
                    echo "";
                  }
                  ?> value="<?=$jab['NIK']?>"><?=$jab['nama_anggota']?></option>
                 <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Detail</label>
              <textarea class="form-control" name="deskripsi" required minlength="50" id="editor"><?php echo $edit['deskripsi'];?></textarea>
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
