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
  if (isset($_POST['simpan'])) {
    $query="INSERT INTO peminjaman values (null,'".$_POST['nama']."','".$_POST['tanggal']."','".$_POST['mulai']."','".$_POST['selesai']."','Booked','".$_POST['deskripsi']."','".$_POST['NP']."','".$_POST['tel']."')";
    $sql=mysqli_query($con,$query);
    if ($sql) {
      echo "<script>alert('Data berhasil ditambah!');window.location.href='index.php?p=peminjaman'</script>";
    }else{
      echo "<script>alert('Penambahan data gagal!');window.location.href='index.php?p=peminjaman'</script>";
    }
  }

 ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form input peminjaman baru</h3>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Peminjam</label>
              <input required type="text" name="NP" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kontak Peminjam</label>
              <input required type="tel" name="tel" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Keperluan peminjaman</label>
              <input required type="text" name="nama" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal peminjaman</label>
              <input required type="date" min="<?php echo date('Y-m-d'); ?>" name="tanggal" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Waktu Mulai</label>
              <input required type="time" format name="mulai" value="08:00" format="HH:mm" class="form-control input-lg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Waktu Selesai</label>
              <input required type="time" name="selesai" format="HH:mm" value="18:00" class="form-control input-lg">
            </div>
            <!-- <div class="form-group">
              <label>Penyelenggara</label>
              <group class="inline-radio">
                <div><input type="radio" name="privasi" value="internal" checked><label>Internal</label></div>
                <div><input type="radio" name="privasi" value="Eksternal"><label>Eksternal</label></div>
              </group>
            </div> -->
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" name="deskripsi" required minlength="50" id="editor"></textarea>
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
