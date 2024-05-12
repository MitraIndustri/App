<?php
session_start();
require("assets/config.php");
$mode = $_GET['mode'];
if (isset($_SESSION['user'])) {
	$sess_username = $_SESSION['user']['username'];
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);
} else if ($mode == 'tamu') {
} else {
    header("Location: ".$cfg_baseurl."login");
}
include("lib/header.php");
?>

    <!--====== SLIDER PART START ======-->

    <section id="home" class="slider_area">
        <div id="carouselThree" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
                <li data-target="#carouselThree" data-slide-to="1"></li>
                <li data-target="#carouselThree" data-slide-to="2"></li>
                <li data-target="#carouselThree" data-slide-to="3"></li>
                <li data-target="#carouselThree" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner">
                
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <?php if (isset($_SESSION['user'])) { ?>
                                    <h1 class="title"><?php echo $data_user['nama']; ?></h1>
                                    <p class="text">Anda sudah login! Silahkan pilih menu untuk mengakses fitur.</p>
                                    <?php } else { ?>
                                    <h1 class="title">Silahkan Login</h1>
                                    <p class="text">Login dengan akun anda dibawah ini untuk mengakses fitur kami.</p>
                                    <?php } ?>
                                    <ul class="slider-btn rounded-buttons">
                                        <?php if (isset($_SESSION['user'])) { ?>
                                        <li><a class="main-btn rounded-one" href="account">ACCOUNT</a></li>
                                        <li><a class="main-btn rounded-two" href="logout">LOGOUT</a></li>
                                        <?php } else { ?>
                                        <li><a class="main-btn rounded-two" href="login">LOGIN</a></li>
                                        <li><a class="main-btn rounded-one" href="form/confirm">DAFTAR</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img class="lazyload" loading="lazy" data-src="assets/images/slider/account.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->
                
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title"><?php echo $cfg_webname; ?></h1>
                                    <p class="text">Download aplikasi <?php echo $cfg_webname; ?> App dibawah ini untuk memudahkan anda mengakses.</p>
                                    <ul class="slider-btn rounded-buttons">
                                        <li><a class="main-btn rounded-one" href="https://davin.id/r/MitraIndustri" target="_blank">PLAY STORE</a></li>
                                        <li><a class="main-btn rounded-two" href="Mitra Industri.apk">DOWNLOAD</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img class="lazyload" loading="lazy" data-src="assets/images/slider/mi.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title">PPDB 2022</h1>
                                    <p class="text">Kalian bisa mengunjungi link pendaftaran siswa didik baru dibawah ini.</p>
                                    <ul class="slider-btn rounded-buttons">
                                        <!--<li><a class="main-btn rounded-one" href="#">GET STARTED</a></li>-->
                                        <li><a class="main-btn rounded-two" href="https://ppdb.smkmitraindustrimm2100.com/">KUNJUNGI</a></li>
                                    </ul>
                                </div> <!-- slider-content -->
                            </div>
                        </div>
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img class="lazyload" loading="lazy" data-src="assets/images/slider/ppdb.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title">BKK MITRA INDUSTRI</h1>
                                    <p class="text">Melamar pekerjaan mudah dengan mendaftar online di BKK SMK Mitra Industri MM2100 dibawah.</p>
                                    <ul class="slider-btn rounded-buttons">
                                        <li><a class="main-btn rounded-one" href="https://bkk.smkmitraindustrimm2100.com">DAFTAR</a></li>
                                        <?php if ($data_user['bkk'] == 'Yes') { ?>
                                        <li><a class="main-btn rounded-two" href="<?php echo $cfg_baseurl; ?>bkk/">ADMIN</a></li>
                                        <?php } ?>
                                    </ul>
                                </div> <!-- slider-content -->
                            </div>
                        </div>
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img class="lazyload" loading="lazy" data-src="assets/images/slider/bkk.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title">Mitra Enterprise</h1>
                                    <p class="text">Pesan dan gunakan jasa wirausaha kami di Mitra Enterprise.</p>
                                    <ul class="slider-btn rounded-buttons">
                                        <!--<li><a class="main-btn rounded-one" href="#">GET STARTED</a></li>-->
                                        <li><a class="main-btn rounded-two" href="https://mitraenterprise.smkmitraindustrimm2100.com/">JUNJUNGI</a></li>
                                    </ul>
                                </div> <!-- slider-content -->
                            </div>
                        </div>
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img class="lazyload" loading="lazy" data-src="assets/images/slider/enterprise.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->
            </div>

            <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
                <i class="lni lni-arrow-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
                <i class="lni lni-arrow-right"></i>
            </a>
        </div>
    </section>

    <!--====== SLIDER PART ENDS ======-->
    
    <!--====== PORTFOLIO PART START ======-->

    <section id="portfolio" class="portfolio-area portfolio-four pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-10">
                        <h3 class="title">Featured Smartschool</h3>
                        <p class="text">Silahkan pilih layanan mana yang ingin digunakan.</p>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row">
                <!--<div class="col-lg-3 col-md-3">-->
                <!--    <div class="portfolio-menu text-center mt-50">-->
                <!--        <ul>-->
                <!--            <li data-filter="*" class="active">ALL</li>-->
                <!--            <li data-filter=".student">STUDENT</li>-->
                <!--            <li data-filter=".teacher">TEACHER</li>-->
                <!--            <li data-filter=".parent">PARENT</li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-lg-12 col-md-12">-->
                <!--    <div class="row no-gutters grid mt-50">-->
                <!--        <div class="col-lg-4 col-sm-4 student">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>absen/">-->
                <!--                    <img src="assets/logo/absensi-s.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 student teacher">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>rapor/">-->
                <!--                    <img src="assets/logo/erapor.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 student">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>vote/">-->
                <!--                    <img src="assets/logo/evote-s.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 student">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>suggestion/">-->
                <!--                    <img src="assets/logo/suggestion-s.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 parent">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>dashboard/">-->
                <!--                    <img src="assets/logo/dashboard.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 teacher">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>maintenance/">-->
                <!--                    <img src="assets/logo/ayocare-s.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 teacher">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>tamu/">-->
                <!--                    <img src="assets/logo/tamu-s.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 marketing-4">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>pelanggaran/">-->
                <!--                    <img src="assets/logo/pelanggaran.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-4 col-sm-4 umum student teacher">-->
                <!--            <div class="single-portfolio">-->
                <!--                <div class="portfolio-image marginin">-->
                <!--                    <a href="<?php echo $cfg_baseurl; ?>spp/">-->
                <!--                    <img src="assets/logo/spp-s.svg" alt="">-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="card card-body text-center">
                    <table class="mb-0">
                        <tbody>
                            <tr>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>presensi/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/presensi.svg" width="120px" align="center" alt="Presensi">
                                        </div>
                                        <h6 class="text-dark"><span>Presensi</span></h6>
                                    </a><br><br>
                                </th>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>rapor/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/erapor.svg" width="120px" align="center" alt="Rapor">
                                        </div>
                                        <h6 class="text-dark"><span>Rapor</span></h6
                                    </a><br><br>
                                </th>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>vote/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/votes.svg" width="120px" align="center" alt="Vote">
                                        </div>
                                        <h6 class="text-dark"><span>Vote</span></h6>
                                    </a><br><br>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>suggestion/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/suggestion.svg" width="120px" align="center" alt="Suggestion">
                                        </div>
                                        <h6 class="text-dark"><span>Suggestion</span></h6>
                                    </a><br><br>
                                </th>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>parent/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/parent.svg" width="120px" align="center" alt="Parent">
                                        </div>
                                        <h6 class="text-dark"><span>Parent</span></h6>
                                    </a><br><br>
                                </th>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>maintenance/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/ayocare-s.svg" width="120px" align="center" alt="Ayo Care">
                                        </div>
                                        <h6 class="text-dark"><span>Ayo Care</span></h6>
                                    </a><br><br>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>tamu/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/tamu.svg" width="120px" align="center" alt="Tamu">
                                        </div>
                                        <h6 class="text-dark"><span>Tamu</span></h6>
                                    </a><br><br>
                                </th>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>pelanggaran/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/pelanggaran.svg" width="120px" align="center" alt="Pelanggaran">
                                        </div>
                                        <h6 class="text-dark"><span>Pelanggaran</span></h6>
                                    </a><br><br>
                                </th>
                                <th>
                                    <a href="<?php echo $cfg_baseurl; ?>spp/" class="text-primary btn-loading">
                                        <div class="text-center w-75 m-auto disable-img">
                                            <img class="lazyload img-fluid" loading="lazy" data-src="assets/logo/spp.svg" width="120px" align="center" alt="SPP">
                                        </div>
                                        <h6 class="text-dark"><span>SPP</span></h6>
                                    </a><br><br>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== PORTFOLIO PART ENDS ======-->
    
    <!--====== PRINICNG START ======-->

    <section id="pricing" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Pricing Plans</h3>
                        <p class="text">Silahkan pilih perbelanjaan anda disini!</p>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                            <img class="lazyload" loading="lazy" data-src="assets/images/basic.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Service Motor</h5>
                            <!--<p class="month"><span class="price">$ 199</span>/month</p>-->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <!--<li><i class="lni lni-check-mark-circle"></i> Carefully crafted components</li>-->
                                <!--<li><i class="lni lni-check-mark-circle"></i> Amazing page examples</li>-->
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="<?php echo $cfg_baseurl; ?>motor/">GET STARTED</a>
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                            <img class="lazyload" loading="lazy" data-src="assets/images/pro.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Service Mobile</h5>
                            <!--<p class="month"><span class="price">$ 399</span>/month</p>-->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <!--<li><i class="lni lni-check-mark-circle"></i> Carefully crafted components</li>-->
                                <!--<li><i class="lni lni-check-mark-circle"></i> Amazing page examples</li>-->
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="<?php echo $cfg_baseurl; ?>mobil/">GET STARTED</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                            <img class="lazyload" loading="lazy" data-src="assets/logo/coffee-c.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Coffee Shop</h5>
                            <!--<p class="month"><span class="price">$ 699</span>/month</p>-->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <!--<li><i class="lni lni-check-mark-circle"></i> Carefully crafted components</li>-->
                                <!--<li><i class="lni lni-check-mark-circle"></i> Amazing page examples</li>-->
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="<?php echo $cfg_baseurl; ?>coffee/">GET STARTED</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== PRINICNG ENDS ======-->
    
    <!--====== ORGANISASI START ======-->

    <section id="organized" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Organized</h3>
                        <p class="text">Silahkan pilih menu dibawah ini ini!</p>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                            <img class="lazyload" loading="lazy" data-src="assets/logo/it-c.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Informatika</h5>
                            <!--<p class="month"><span class="price">$ 199</span>/month</p>-->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <!--<li><i class="lni lni-check-mark-circle"></i> Carefully crafted components</li>-->
                                <!--<li><i class="lni lni-check-mark-circle"></i> Amazing page examples</li>-->
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="https://it.smkmitraindustrimm2100.com/">VISIT</a>
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                            <img class="lazyload" loading="lazy" data-src="assets/logo/osis-c.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">OSIS 5K</h5>
                            <!--<p class="month"><span class="price">$ 399</span>/month</p>-->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <!--<li><i class="lni lni-check-mark-circle"></i> Carefully crafted components</li>-->
                                <!--<li><i class="lni lni-check-mark-circle"></i> Amazing page examples</li>-->
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="<?php echo $cfg_baseurl; ?>osis/">VISIT</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                            <img class="lazyload" loading="lazy" data-src="assets/logo/hydroponic-c.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Hydroponic</h5>
                            <!--<p class="month"><span class="price">$ 699</span>/month</p>-->
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <!--<li><i class="lni lni-check-mark-circle"></i> Carefully crafted components</li>-->
                                <!--<li><i class="lni lni-check-mark-circle"></i> Amazing page examples</li>-->
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-one" href="<?php echo $cfg_baseurl; ?>hydroponic/">VISIT</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== ORGANISASI ENDS ======-->
    
    <!--====== FEATRES TWO PART START ======-->

    <section id="services" class="features-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-10">
                        <h3 class="title">Our Services</h3>
                        <p class="text">Kunjungi laman-laman dari profile website kami disini!</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features mt-40">
                        <div class="features-title-icon d-flex justify-content-between">
                            <h4 class="features-title"><a href="#visi-misi">Visi & Misi</a></h4>
                            <div class="features-icon">
                                <i class="lni lni-bolt"></i>
                                <img class="shape lazyload" loading="lazy" data-src="assets/images/f-shape-1.svg" alt="Shape">
                            </div>
                        </div>
                        <div class="features-content">
                            <p class="text">Lihat Visi & Misi SMK Mitra Industri MM2100 disini.</p>
                            <a class="features-btn" href="#visi-misi">LEARN MORE</a>
                        </div>
                    </div> <!-- single features -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features mt-40">
                        <div class="features-title-icon d-flex justify-content-between">
                            <h4 class="features-title"><a href="lsp">LSP</a></h4>
                            <div class="features-icon">
                                <i class="lni lni-brush"></i>
                                <img class="shape lazyload" loading="lazy" data-src="assets/images/f-shape-1.svg" alt="Shape">
                            </div>
                        </div>
                        <div class="features-content">
                            <p class="text">Kunjungi informasi tentang LSP disini.</p>
                            <a class="features-btn" href="<?php echo $cfg_baseurl; ?>lsp">LEARN MORE</a>
                        </div>
                    </div> <!-- single features -->
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-features mt-40">
                        <div class="features-title-icon d-flex justify-content-between">
                            <h4 class="features-title"><a href="skl">SKL</a></h4>
                            <div class="features-icon">
                                <i class="lni lni-layout"></i>
                                <img class="shape lazyload" loading="lazy" data-src="assets/images/f-shape-1.svg" alt="Shape">
                            </div>
                        </div>
                        <div class="features-content">
                            <p class="text">Kunjungi informasi tentang SKL disini.</p>
                            <a class="features-btn" href="<?php echo $cfg_baseurl; ?>skl">LEARN MORE</a>
                        </div>
                    </div> <!-- single features -->
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== FEATRES TWO PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-content mt-45">
                        <div class="about-title">
                            <h6 class="sub-title">A Little More About Us</h6>
                            <h4 class="title">Frequently Asked Questions <br> About <?php echo $cfg_webname; ?></h4>
                        </div> <!-- faq title -->
                        <div class="about-accordion">
                            <div class="accordion" id="accordionExample">
                                <?php
                            	$question = mysqli_query($db, "SELECT * FROM question WHERE id = 1 ORDER BY id ASC");
                            	while ($answer = mysqli_fetch_assoc($question)) {
                            	?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <a href="#" data-toggle="collapse" data-target="#target-<?php echo $answer['target']; ?>" aria-expanded="true" aria-controls="target-<?php echo $answer['target']; ?>"><?php echo $answer['question']; ?></a>
                                    </div>

                                    <div id="target-<?php echo $answer['target']; ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text"><?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($answer['answer']))); ?></p>
                                        </div>
                                    </div> 
                                </div> <!-- card -->
                                <?php } ?>
                                <?php
                            	$question = mysqli_query($db, "SELECT * FROM question WHERE id > 1 ORDER BY id ASC");
                            	while ($answer = mysqli_fetch_assoc($question)) {
                            	?>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#target-<?php echo $answer['target']; ?>" aria-expanded="false" aria-controls="target-<?php echo $answer['target']; ?>"><?php echo $answer['question']; ?></a>
                                    </div>
                                    <div id="target-<?php echo $answer['target']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text"><?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($answer['answer']))); ?></p>
                                        </div>
                                    </div>
                                </div> <!-- card -->
                                <?php } ?>
                            </div>
                        </div> <!-- faq accordion -->
                    </div> <!-- faq content -->
                </div>
                <!--<div class="col-lg-7">-->
                <!--        <a href="<?php echo $cfg_baseurl; ?>barcode/">-->
                <!--        <div class="about-title">-->
                <!--            <br><br>-->
                <!--            <center><h6 class="sub-title">Barcode Generator</h6></center>-->
                <!--        </div> <!-- faq title -->
                <!--    <div class="about-image mt-50">-->
                <!--        <img class="lazyload" loading="lazy" data-src="<?php echo $cfg_baseurl; ?>assets/logo/barcode-s.PNG" height="450" width="450" alt="about">-->
                <!--    </div> <!-- faq image -->
                <!--        </a>-->
                <!--</div>-->
            </div>
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->
    
    <!--====== TESTIMONIAL PART START ======-->

<!--    <section id="visi-misi" class="testimonial-area">-->
<!--        <div class="container">-->
<!--            <div class="row justify-content-between">-->
<!--                <div class="col-xl-5 col-lg-6">-->
<!--                    <div class="testimonial-left-content mt-45">-->
<!--                        <h6 class="sub-title">Profile</h6>-->
<!--                        <h4 class="title">Visi & Misi <br> SMK Mitra Industri MM2100</h4>-->
<!--                        <ul class="testimonial-line">-->
<!--                            <li></li>-->
<!--                            <li></li>-->
<!--                            <li></li>-->
<!--                            <li></li>-->
<!--                        </ul>-->
<!--                        <p class="text">-->
<!--                        VISI-->
<!--<br><br>-->
<!--SMK Mitra Industri MM2100 sebagai pusat pendidikan dan pengembangan yang mencetak siswa sesuai dengan kebutuhan industri dan berjiwa wirausaha-->
<!--<br><br>-->
<!--MISI-->
<!--<br><br>-->
<!--1. Membentuk karakter siswa berperilaku positif<br>-->
<!--2. Membekali siswa  dengan pengetahuan dan keterampilan sesuai kebutuhan industri<br>-->
<!--3. Membangun jiwa wirausaha yang tangguh<br>-->
<!--                        </p>-->
<!--                    </div> <!-- testimonial left content -->
<!--                </div>-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="testimonial-right-content mt-50">-->
<!--                        <div class="quota">-->
<!--                            <i class="lni lni-quotation"></i>-->
<!--                        </div>-->
<!--                        <div class="testimonial-content-wrapper testimonial-active">-->
                                <?php
                            	$testimonial = mysqli_query($db, "SELECT * FROM testimonial ORDER BY id ASC");
                            	while ($testi = mysqli_fetch_assoc($testimonial)) {
                            	?>
<!--                            <div class="single-testimonial">-->
<!--                                <div class="testimonial-text">-->
<!--                                    <p class="text">“<?php echo $testi['komen']; ?>”</p>-->
<!--                                </div>-->
<!--                                <div class="testimonial-author d-sm-flex justify-content-between">-->
<!--                                    <div class="author-info d-flex align-items-center">-->
<!--                                        <div class="author-image">-->
<!--                                            <img class="lazyload" loading="lazy" data-src="<?php echo $testi['foto']; ?>" alt="author">-->
<!--                                        </div>-->
<!--                                        <div class="author-name media-body">-->
<!--                                            <h5 class="name"><?php echo $testi['nama']; ?></h5>-->
<!--                                            <span class="sub-title"><?php echo $testi['jabatan']; ?></span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="author-review">-->
<!--                                        <ul class="star">-->
<!--                                            <li><i class="lni lni-star-filled"></i></li>-->
<!--                                            <li><i class="lni lni-star-filled"></i></li>-->
<!--                                            <li><i class="lni lni-star-filled"></i></li>-->
<!--                                            <li><i class="lni lni-star-filled"></i></li>-->
<!--                                            <li><i class="lni lni-star-filled"></i></li>-->
<!--                                        </ul>-->
<!--                                        <span class="review">( <?php echo $testi['review']; ?> Reviews )</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div> <!-- single testimonial -->
                                <?php } ?>
<!--                        </div> <!-- testimonial content wrapper -->
<!--                    </div> <!-- testimonial right content -->
<!--                </div>-->
<!--            </div>-->
<!--        </div> <!-- container -->
<!--    </section>-->

    <!--====== TESTIMONIAL PART ENDS ======-->
    
    <!--====== NEWS START ======-->

    <!--<section id="news" class="team-area pt-120 pb-130">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-lg-6 col-md-10">-->
    <!--                <div class="section-title text-center pb-30">-->
    <!--                    <h3 class="title">Berita</h3>-->
    <!--                    <p class="text">Berita Terbaru</p>-->
    <!--                </div> <!-- section title -->
    <!--            </div>-->
    <!--        </div> <!-- row -->
    <!--        <div class="row">-->
                <?php
            	$information = mysqli_query($db, "SELECT * FROM information ORDER BY id ASC");
            	while ($info = mysqli_fetch_assoc($information)) {
            	?>
                <!--<div class="col-lg-4 col-sm-6">-->
                <!--    <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">-->
                <!--        <div class="team-image">-->
                <!--            <a href="<?php echo $cfg_baseurl; ?>news/<?php echo $info['target']; ?>">-->
                <!--            <img class="lazyload" loading="lazy" data-src="<?php echo $info['gambar']; ?>" alt="Team">-->
                <!--            </a>-->
                <!--            <br><br><br><br><br><br><br>-->
                <!--        </div>-->
                <!--        <div class="team-content">-->
                <!--            <h4 class="team-name"><a href="<?php echo $cfg_baseurl; ?>news/<?php echo $info['target']; ?>"><?php echo $info['judul']; ?></a></h4>-->
                <!--            <span class="sub-title"><?php echo $info['dates']; ?></span>-->
                <!--        </div>-->
                <!--    </div> <!-- single team -->
                <!--</div>-->
                <?php } ?>
    <!--        </div> <!-- row -->
    <!--    </div> <!-- container -->
    <!--</section>-->

    <!--====== NEWS  ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">Contact</h3>
                        <p class="text">Hubungi kami disini!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <!--<div class="row">-->
            <!--    <div class="col-lg-12">-->
            <!--        <div class="contact-map mt-30">-->
            <!--            <iframe id="gmap_canvas" class="lazyload" loading="lazy" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.934995965768!2d107.1017057!3d-6.2986756!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4be340550b2c3a65!2sSMK%20Mitra%20Industri!5e0!3m2!1sid!2sid!4v1638676706694!5m2!1sid!2sid" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>-->
            <!--        </div> <!-- row -->
            <!--    </div>-->
            <!--</div> <!-- row -->
            <div class="contact-info pt-30">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text"> Jl. Kalimantan Blok DD 1-1 Kawasan Industri MM2100, Kec. Cikarang Barat, Kab. Bekasi, Prov. Jawa Barat 17530</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">smkmitraindustrimm2100@smkind-mm2100.sch.id</p>
                                <p class="text">smkmitraindustrimm2100@smkind-mm2100.sch.id</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                            <div class="contact-info-icon">
                                <i class="lni lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text"><a href="https://wa.me/62811621917">081 1162 1917 (PPDB)</a></p>
                                <p class="text"><a href="https://wa.me/6281294930063">0812 9493 0663 (BKK)</a></p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
<?php
if (isset($_POST['send'])) {
	    $name = $db->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['name'],ENT_QUOTES)))));;
	    $email = $db->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_POST['email'],ENT_QUOTES)))));;
	    $message = $_POST['message'];
	    
        $data = [
            'api_key' => ''.$cfg_apikey.'',
            'sender'  => ''.$cfg_bot.'',
            'number'  => ''.$cfg_notification.'',
            'message' => 'Mitra Industri Message

Name : '.$name.'
Email : '.$email.'
Message : '.$message.'',
            'footer' => 'Date : '.$date.'
Time : '.$time.'
Ip : '.$ip.'
Device : '.$device.'',
            'template1' => 'url|'.$time.'|'.$cfg_baseurl.'',
            'template2' => 'url|smkmitraindustrimm2011.com|'.$cfg_baseurl.''
        ];       
        $curl = curl_init();             
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://whatsapp.webhook.my.id/send-template",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        
        mysqli_query($db, "INSERT INTO message (name, email, message, device, ip, dates, date, time) VALUES ('$name', '$email', '$message', '$device', '$ip', '$dates', '$date', '$time')");
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-wrapper form-style-two pt-115">
                        <h4 class="contact-title pb-10"><i class="lni lni-envelope"></i> Leave <span>A Message.</span></h4>
                        
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Name</label>
                                        <div class="input-items default">
                                            <input name="name" type="text" placeholder="Name" required>
                                            <i class="lni lni-user"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Email</label>
                                        <div class="input-items default">
                                            <input type="email" name="email" placeholder="Email" required>
                                            <i class="lni lni-envelope"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input mt-25">
                                        <label>Massage</label>
                                        <div class="input-items default">
                                            <textarea name="message" placeholder="Massage" required></textarea>
                                            <i class="lni lni-pencil-alt"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="form-input light-rounded-buttons mt-30">
                                        <button class="main-btn light-rounded-two" type="submit" name="send">Send Message</button>
                                    </div> <!-- form input -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- contact wrapper form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->
    
    <!--====== TEAM START ======-->

    <!--<section id="team" class="team-area pt-120 pb-130">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-lg-6 col-md-10">-->
    <!--                <div class="section-title text-center pb-30">-->
    <!--                    <h3 class="title" id="developer">Developer</h3>-->
    <!--                    <p class="text"><a href="https://it.smkmitraindustrimm2100.com">Team IT of SMK Mitra Industri MM2100</a></p>-->
    <!--                </div> <!-- section title -->
    <!--            </div>-->
    <!--        </div> <!-- row -->
    <!--        <div class="row">-->
                    <?php
                	$check = mysqli_query($db, "SELECT * FROM developer ORDER BY id ASC");
                	while ($data = mysqli_fetch_assoc($check)) {
                	?>
    <!--            <div class="col-lg-4 col-sm-6">-->
    <!--                <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">-->
    <!--                    <div class="team-image">-->
    <!--                        <a target="_blank" href="<?php echo $data['website']; ?>">-->
    <!--                        <img class="lazyload" loading="lazy" data-src="<?php echo $data['foto']; ?>" alt="Team">-->
    <!--                        </a>-->
    <!--                        <br><br><br><br><br><br><br><br>-->
    <!--                    </div>-->
    <!--                    <div class="team-content">-->
    <!--                        <div class="team-social">-->
    <!--                            <ul class="social">-->
    <!--                                <li><a href="https://facebook.com/<?php echo $data['facebook']; ?>"><i class="lni lni-facebook-filled"></i></a></li>-->
    <!--                                <li><a href="https://linkedin.com/in/<?php echo $data['linkedin']; ?>"><i class="lni lni-twitter-original"></i></a></li>-->
    <!--                                <li><a href="https://twitter.com/<?php echo $data['website']; ?>"><i class="lni lni-linkedin-original"></i></a></li>-->
    <!--                                <li><a href="https://instagram.com/<?php echo $data['instagram']; ?>"><i class="lni lni-instagram"></i></a></li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                        <?php if ($data['username'] == $sess_username) { ?>-->
    <!--                        <a target="_blank" href="<?php echo $data['website']; ?>"><h4 class="btn btn-primary team-name"><?php echo $data['nama']; ?></h4></a><br>-->
    <!--                        <?php } else { ?>-->
    <!--                        <a target="_blank" href="<?php echo $data['website']; ?>"><h4 class="team-name"><?php echo $data['nama']; ?></h4></a>-->
    <!--                        <?php } ?>-->
    <!--                        <br>-->
    <!--                        <span class="sub-title"><?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($data['job']))); ?></span>-->
    <!--                        <br>-->
    <!--                        <br>-->
    <!--                        <span class="sub-title"><?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($data['desk']))); ?></span>-->
    <!--                    </div>-->
    <!--                </div> <!-- single team -->
    <!--            </div>-->
    <!--            <?php } ?>-->
    <!--        </div> <!-- row -->
    <!--    </div> <!-- container -->
    <!--</section>-->

    <!--====== TEAM  ENDS ======--> 
    
<?php
include("lib/footer.php");
if (isset($_POST['send'])) {
if ($response) {
	            echo "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Your message has been send.'})</script>";
            } else {
				echo "<script>Swal.fire({icon: 'error',title: 'Error',text: 'Error system.'})</script>";
                }
}
	       
$count_ip = mysqli_num_rows(mysqli_query($db, "SELECT * FROM login WHERE ip = '$ip' AND device = '$device'"));
if ($count_ip < 2) {
?>
<script>
Swal.fire({
  icon: 'info',
  title: 'Mitra Industri',
  text: 'Selamat datang di Mitra Industri Apps, layanan untuk memudahkan sistem operasional di sekolah. Mari wujudkan sekolah berbasis revolusi industri 4.0.',
  footer: '<a target="_blank" href="https://davin.id/r/MitraIndustri">Download Application</a>'
})
</script>
<?php
}
?>
</body>

</html>