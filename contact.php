<?php include 'admin/config/connection.php'; 

if (isset($_POST['submit'])) {
    $query="INSERT INTO peminjaman values (null,'".$_POST['keperluan']."','".$_POST['tgl']."','".$_POST['mulai']."','".$_POST['selesai']."','Booked','".$_POST['deskripsi']."','".$_POST['nama']."','".$_POST['tel']."')";
    $sql=mysqli_query($con,$query);
    if ($sql) {
      //echo "<script>alert('Data berhasil ditambah!');window.location.href='index.php?p=peminjaman'</script>";
      $alert='
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Permohonan Tersimpan</strong> Silakan lanjutkan administrasi berikutnya.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ';
    }else{
      //echo "<script>alert('Penambahan data gagal!');window.location.href='index.php?p=peminjaman'</script>";
      $alert='
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Permohonan ditolak</strong> dikarenakan tidak memenuhi syarat.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ';
    }
  }

?>
<!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Permohonan Tersimpan</strong> Silakan lanjutkan administrasi berikutnya.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Peminjaman Karang Taruna Ujung Menteng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<?php include 'nav.php'; ?>
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Permohonan Pinjaman</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">

      <?php
      if (isset($alert)) {
        echo $alert;
      }
      ?>
      <!-- <div class="d-none d-sm-block mb-5 pb-4">
       
        <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var grayStyles = [
              {
                featureType: "all",
                stylers: [
                  { saturation: -90 },
                  { lightness: 50 }
                ]
              },
              {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -31.197, lng: 150.744},
              zoom: 9,
              styles: grayStyles,
              scrollwheel:  false
            });
          }
          
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
        
      </div> -->


      <div class="row">
        <div class="col-lg-8 ">
        <div class="job_details_area bg-white mt-0">
        <div class="col-lg-12">
            
                        <h4>Permohonan Peminjaman</h4>
                 
                <div class="apply_job_form white-bg mt-0">
                        <form action="" method="post">
                            

                            <div class="row">
                                <div class="col-md-12">
                                  <label>Nama Peminjam</label>
                                  <div class="input_field">
                                    <input required type="text" name="nama" <?php if (isset($_POST['nama'])) { echo "value='".$_POST['nama']."'";} ?>placeholder="Peminjaman atas nama">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <label>Kontak</label>
                                  <div class="input_field">
                                    <input required type="tel" name="tel" <?php if (isset($_POST['tel'])) { echo "value='".$_POST['tel']."'";} ?> placeholder="Nomor Telpon / WA">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <label>Peminjaman Tanggal</label>
                                  <div class="input_field">
                                    <input required type="date" name="tgl" <?php if (isset($_POST['tgl'])) { echo "value='".$_POST['tgl']."'";} ?> min="<?=date('Y-m-d')?>" placeholder="Tanggal">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Waktu Mulai <small style="color: red; margin-top: 0">Input waktu menggunakan AM / PM</small></label>
                                    <div class="input_field">
                                        <input required type="time" name="mulai" <?php if (isset($_POST['mulai'])) { echo "value='".$_POST['mulai']."'";} ?> placeholder="Mulai">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                  <label>Waktu Selesai</label>
                                    <div class="input_field">
                                        <input required type="time" name="selesai" <?php if (isset($_POST['selesai'])) { echo "value='".$_POST['selesai']."'";} ?>placeholder="Waktu Selesai">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  <label>Keperluan Peminjaman</label>
                                    <div class="input_field">
                                        <input required type="text" name="keperluan" <?php if (isset($_POST['keperluan'])) { echo "value='".$_POST['keperluan']."'";} ?> placeholder="Keperluan Peminjaman">
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                          <label class="custom-file-label" for="inputGroupFile03">Upload CV</label>
                                        </div>
                                      </div>
                                </div> -->
                                <div class="col-md-12">
                                  <label>Deskripsi</label>
                                    <div class="input_field">
                                        <textarea required name="deskripsi" id="message" cols="30" rows="10" placeholder="Saya meminjam ini untuk suatu keperluan ... "><?php if (isset($_POST['deskripsi'])) { echo $_POST['deskripsi'];} ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" name="submit" type="submit">Booking Permohonan Peminjaman</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
            
    </div>
</div>
          <!-- <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
            </div>
          </form> -->
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Gedung Karang Taruna Ujung Menteng</h3>
              <p>Alamatnya lu masukin sini dah dul</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-time"></i></span>
            <div class="media-body">
              <h3>Tanggal Pemesanan Dimulai Hari ini</h3>
              <p>Hingga beberapa hari kedepan</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone-alt"></i></span>
            <div class="media-body">
              <h3>Info Lebih Lanjut Kontak Humas</h3>
              <p><?php $jab=mysqli_query($con,"SELECT * FROM anggota join jabatan on anggota.jabatan=jabatan.id where jabatan.nama_jabatan='Humas' or jabatan.nama_jabatan='humas' or jabatan.nama_jabatan='hubungan masyarakat' or jabatan.nama_jabatan='Hubungan Masyarakat' order by NIK");
                while ($humas=mysqli_fetch_array($jab)) {
                  echo $humas['tel'].'. ';
                }
               ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <?php include 'footer.php'; ?>
  <!-- JS here -->
  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/ajax-form.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/scrollIt.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/nice-select.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/gijgo.min.js"></script>

  <!--contact js-->
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>

  <script src="js/main.js"></script>
</body>

</html>