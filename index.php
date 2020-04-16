<?php include 'admin/config/connection.php'; ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Karang Taruna Ujung Menteng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">

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
        p span .badge{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .single_candidates{
            border:white solid 1px;
            transition: 0.5s;
        }
        .single_candidates:hover{
            border:lightgreen solid 1px;
            transition: 0.5s;
        }
    </style>
</head>

<body>

    <?php include 'nav.php'; ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">Karang Taruna</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Ujung Menteng</h3>
                            <!-- <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="#" class="boxed-btn3">Upload your Resume</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->
    <div id="about">
        <br><br><br>
    </div>
    <!-- catagory_area -->
    <div class="catagory_area">
        <div class="container">
            <div class="desc">
                <h2 class="wow fadeInRight">Pengertian Karang Taruna</h2>
                <p class="text-justify wow fadeInLeft"><strong>Karang Taruna</strong> adalah organisasi kepemudaan di Indonesia. Karang Taruna merupakan wadah pengembangan generasi muda nonpartisan, yang tumbuh atas dasar kesadaran dan rasa tanggung jawab sosial dari, oleh dan untuk masyarakat khususnya generasi muda di wilayah Desa/ Kelurahan atau komunitas sosial sederajat, yang terutama bergerak dibidang kesejahteraan sosial. Sebagai organisasi sosial kepemudaan Karang Taruna merupakan wadah pembinaan dan pengembangan serta pemberdayaan dalam upaya mengembangkan kegiatan ekonomi produktif dengan pendayagunaan semua potensi yang tersedia di lingkungan baik sumber daya manusia maupun sumber daya alam yang telah ada. Sebagai organisasi kepemudaan, Karang Taruna berpedoman pada Pedoman Dasar dan Pedoman Rumah Tangga di mana telah pula diatur tentang struktur pengurus dan masa jabatan di masing-masing wilayah mulai dari Desa/ Kelurahan sampai pada tingkat Nasional. Semua ini wujud dari pada regenerasi organisasi demi kelanjutan organisasi serta pembinaan anggota Karang Taruna baik dimasa sekarang maupun masa yang akan datang.
                <br>                <br>
                <strong>Karang Taruna</strong> didirikan dengan tujuan memberikan pembinaan dan pemberdayaan kepada para remaja, misalnya dalam bidang keorganisasian, ekonomi, olahraga, ketrampilan, advokasi, keagamaan dan kesenian. </p>
            </div>
            <!-- <div class="row cat_search">
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <input type="text" placeholder="Search keyword">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide" >
                            <option data-display="Location">Location</option>
                            <option value="1">RW 01</option>
                            <option value="2">RW 02</option>
                          </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide">
                            <option data-display="Category">Category</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="4">Category 3</option>
                          </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="job_btn">
                        <a href="#" class="boxed-btn3">Find Job</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!--/ catagory_area -->
    <div  id="kegiatan"><br><br><br></div>
    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Kegiatan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $keg=mysqli_query($con,"SELECT * from kegiatan where tanggal < '".date("Y-m-d")."' order by tanggal desc limit 1");
                    while ($kegiatan=mysqli_fetch_array($keg)) {?>
                    
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory"  style="height: 250px;">
                        <a href="jobs.html"><h4 style="height: 50px;"><?=$kegiatan['nama_kegiatan']?></h4></a>
                        <p>
                        <span ><?php echo date_format(date_create($kegiatan['tanggal']),'d M'); ?></span>
                        <br>
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

                     ?> </p>
                    </div>
                </div>
                <?php
                    }
                 ?>
                <?php $keg=mysqli_query($con,"SELECT * from kegiatan where tanggal > '".date("Y-m-d")."' order by tanggal asc limit 3");
                    while ($kegiatan=mysqli_fetch_array($keg)) {?>
                    
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory" style="height: 250px;">
                        <a href="jobs.html"><h4 style="height: 50px;"><?=$kegiatan['nama_kegiatan']?></h4></a>
                        <p>
                        <span><?php echo date_format(date_create($kegiatan['tanggal']),'d M'); ?></span>
                        <br>
                    <?php 
                        if (strlen($kegiatan['deskripsi']) > 50){
                            $str = substr($kegiatan['deskripsi'], 0, 43) . '...';
                          }else{
                            $str=$kegiatan['deskripsi'];
                          }
                          echo $str;
                     ?> </p>
                    </div>
                </div>
                <?php
                    }
                 ?>
            </div>
        </div>
    </div>
    
    <!-- job_listing_area_end  -->
        <div  id="anggota"><br><br><br><br><br><br></div>
    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area"  style="background: none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Anggota</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel" >
                        <?php $angg=mysqli_query($con,"SELECT * FROM anggota");
                        while ($anggota=mysqli_fetch_array($angg)) {
                            
                         ?>
                        <div class="single_candidates text-center" style="height: 280px">
                            <div class="thumb">
                                <img height="100px" src="admin/assets/img/anggota/<?=$anggota['img']?>">
                            </div>
                            <a href="#"><h4><?=$anggota['nama_anggota']?></h4></a>
                            <p><?php 
                            $jab=mysqli_fetch_array(mysqli_query($con,"SELECT * from jabatan where id='".$anggota["jabatan"]."'"));
                            echo $jab['nama_jabatan'] ;?></p>
                        </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->
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