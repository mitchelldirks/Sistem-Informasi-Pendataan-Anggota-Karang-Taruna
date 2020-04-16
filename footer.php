
    <!-- footer start -->
    <footer class="footer mb-0">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="" height="100px" style="margin-top: 10px">
                                </a>
                            </div>
                            <p>
                                Karang Taruna<br> Ujung Menteng
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                            <h3 class="footer_title">
                                Section
                            </h3>
                            <ul>
                                <li><a href="#about">Tentang</a></li>
                                <li><a href="#kegiatan">Kegiatan</a></li>
                                <li><a href="#anggota">anggota</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                            <h3 class="footer_title">
                                Halaman
                            </h3>
                            <ul>
                                <li><a href="jobs.php">Jabatan</a></li>
                                <li><a href="job_details.php">Kegiatan</a></li>
                                <li><a href="contact.php">Peminjaman</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <?php
                            if (isset($_POST['Subscribe'])) {
                                $insert=mysqli_query($con,"INSERT INTO inquiry values ('".$_POST['email']."',null)");
                                if ($insert) {
                                    echo "<script>alert('Subscribe berhasil, nantikan informasi kegiatan selanjutnya')</script>";
                                }else{
                                    echo "<script>alert('Subscribe gagal, coba lagi')</script>";
                                }
                            }
                              
                                ?>  
                            <form action="" method="POST" class="newsletter_form">
                                <input type="email" required name="email" placeholder="Masukan E-mail">
                                <button type="submit" name="Subscribe">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Ikuti dan dapatkan pemberitahuan tentang kegiatan Karang Taruna Ujung Menteng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".2s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://github.com/pottsed" target="_blank"> Pottsed</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->