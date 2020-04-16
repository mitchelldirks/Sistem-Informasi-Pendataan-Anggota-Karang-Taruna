<?php include 'admin/config/connection.php'; ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kegiatan Karang Taruna Ujung Menteng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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
    <link rel="stylesheet" href="css/slicknav.css">

    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        body{
            overflow-x: hidden;
        }
    </style>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

   <?php include 'nav.php'; ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Kegiatan Karang Taruna Ujung Menteng</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container m-2 mb-4 col-lg-12 row">
        <div class="col-lg-8">
            
            <div class="row">
                 <?php $keg=mysqli_query($con,"SELECT * from kegiatan where tanggal < '".date("Y-m-d")."' order by tanggal desc");
                    while ($kegiatan=mysqli_fetch_array($keg)) { ?>
                <div class="col-lg-12" >

                    <div class="job_details_header" >
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/logo.png" height="70px" width="70px" style="margin: -10px;" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#"><h4><?=$kegiatan["nama_kegiatan"]?></h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p>
                                                
                                                <?php 
                        
                                        if($kegiatan['status']=='Booked') {
                                          if($kegiatan['tanggal']==date('Y-m-d')){//hari ini acarana?>
                                            <a style="color: red" >Belum Dipastikan</a>
                                    <?php }elseif($kegiatan['tanggal'] > date('Y-m-d')){//belon harina?>
                                            <a ><?= $kegiatan['status'] ?></a>
                                    <?php }elseif($kegiatan['tanggal'] < date('Y-m-d')) {//udah liwat?>
                                            <span class="badge badge-danger mt-2" style="background: red;color: white">Dibatalkan</span>
                                    <?php }
                                  }elseif ($kegiatan['status']=='Reserved') {
                                    if($kegiatan['tanggal']==date('Y-m-d')){//hari ini acarana?>
                                            <span class="badge badge-danger mt-2" style="background: green;color: white">Berlangsung</span>
                                    <?php }elseif($kegiatan['tanggal'] > date('Y-m-d')){//belon harina?>
                                            <span class="badge badge-danger bg-primary mt-2" style="color: white">Terjadwal</span>
                                    <?php }elseif($kegiatan['tanggal'] < date('Y-m-d')) {//udah liwat?>
                                            <span class="badge badge-danger mt-2" style="background: darkblue;color: white">Terlaksana</span>
                                    <?php }}

                                     ?>
                                            </p>
                                        </div>
                                        <!-- <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> California, USA</p>
                                        </div> -->
                                        <div class="location">
                                            <p> <i class="fa fa-calendar"></i> <?php echo date_format(date_create($kegiatan['tanggal']),'d M'); ?></p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> <?php echo date_format(date_create($kegiatan['mulai']),'H:i'); ?> - <?php echo date_format(date_create($kegiatan['selesai']),'H:i'); ?> </p>
                                        </div>
                                        <div class="location">
                                            <p> <!-- <i class="fa fa-user"></i> --><!--  Penanggung Jawab  -->
                                                <?php $circle=mysqli_fetch_array(mysqli_query($con,"SELECT * from anggota where NIK='".$kegiatan["NIK"]."'")); ?>
                                                <img style="border-radius: 50%" class="img-circle" height="30px" width="30px" title="<?=$circle['nama_anggota']?>" src="admin/assets/img/anggota/<?=$circle['img']?>" >
                                                <?=$circle['nama_anggota']?>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <!-- <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg" style=" margin-bottom: 1em">
                        <div class="single_wrap">
                            <h4>Deskripsi</h4>
                            <p><?=$kegiatan["deskripsi"]?></p>
                        </div>
                        
                    </div>
                    
                </div>
            <?php } ?>
<!--                 <div class="apply_job_form white-bg">
                        <h4>Apply for the job</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text" placeholder="Website/Portfolio link">
                                    </div>
                                </div>
                                <div class="col-md-12">
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
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="#" id="" cols="30" rows="10" placeholder="Coverletter"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                
            </div>
        </div>
        <div class="col-lg-4">
            <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Kegiatan Selanjutnya</h3>
                        </div>
            <?php
            $keg=mysqli_query($con,"SELECT * from kegiatan where status='Reserved' and tanggal > '".date("Y-m-d")."' order by tanggal asc limit 1");
            $upcoming=mysqli_fetch_array($keg);
            if (mysqli_num_rows($keg) > 0) {
                
            ?>
                    
                        <div class="job_content">
                            <h3><?=$upcoming['nama_kegiatan']?></h3>
                            <ul>
                                <li>Tanggal <span class="pull-right"><?=date_format(date_create($upcoming['tanggal']),'d M')?></span></li>
                                <li>Pukul <span class="pull-right"><?=date_format(date_create($upcoming['mulai']),'H:i')?> - <?=date_format(date_create($upcoming['selesai']),'H:i')?></span></li>
                                <!-- <li>Salary: <span>50k - 120k/y</span></li>
                                <li>Location: <span>California, USA</span></li>
                                <li>Job Nature: <span> Full-time</span></li> -->
                            </ul>
                        </div>
                    
                    <!-- <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                    <div class="job_location_wrap">
                        <div class="job_lok_inner">
                            <div id="map" style="height: 200px;"></div>
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
                            
                          </div>
                    </div> -->
                <?php }else{?>
                        <div class="job_content">
                            <h5 style="color: grey"><i class="fa fa-clock-o"></i> Belum ada jadwal kegiatan berikutnya</h5>
                            
                        </div>
                <?php } ?>
                </div>
                </div>
    </div>
</div>

<?php include 'footer.php'; ?>
    <!-- link that opens popup -->
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