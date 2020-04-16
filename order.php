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