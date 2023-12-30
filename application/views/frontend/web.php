<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= get_setting('nama_website') ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/logo/') . get_setting('logo_website') ?>" rel="icon">
    <link href="<?= base_url('assets/img/logo/') . get_setting('logo_website') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/frontend/') ?>vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/frontend/') ?>css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Green
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="mailto:<?= get_setting('email') ?>"><?= get_setting('email') ?></a>
                <i class="bi bi-whatsapp phone-icon"></i> <?= get_setting('whatsapp') ?>
            </div>
            <div class="social-links d-none d-md-block">
                <a href="https://<?= get_setting('facebok') ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://<?= get_setting('instagram') ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://<?= get_setting('youtube') ?>" class="youtube"><i class="bi bi-youtube"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="<?= site_url('/') ?>" class="logo"><img src="<?= base_url('assets/img/logo/') . get_setting('logo_website') ?>" alt="" class="img-fluid"></a>
            <h1 class="logo me-auto"><a href="<?= site_url('/') ?>"><?= get_setting('nama_website') ?></a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#data-masjid">Data Masjid</a></li>
                    <li><a class="nav-link scrollto" href="#jadwal">Jadwal Sholat</a></li>
                    <li><a class="getstarted scrollto" href="<?= site_url('login') ?>">Login/Daftar</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Masjid yang Terdaftar ======= -->
        <section id="data-masjid" class="team section-bg text-center">
            <div class="container">

                <div class="section-title">
                    <h2>Masjid/Musala</h2>
                    <p>Kami bangga melihat berbagai Masjid dan Musala yang telah sukses mengadopsi Aplikasi Keuangan kami dalam pengelolaan keuangan mereka. Bersama-sama, kami membentuk jejak keberhasilan, membuktikan bahwa solusi ini tidak hanya menguntungkan tetapi juga diakui oleh beragam komunitas keagamaan.</p>
                </div>

                <div class="row" id="masjidContainer">
                    <?php foreach ($masjid as $data) : ?>
                        <?php if ($data['name_resmi'] !== null && $data['date_resmi'] !== null && $data['lokasi'] !== null) : ?>
                            <?php $url = url_title($data['name_resmi'], '-', TRUE); ?>
                            <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <a href="<?= site_url('masjid/') . $data['id'] . '/' . $url ?>"><img src="<?= base_url('assets/img/profile/') . ($data['image'] ? $data['image'] : 'default.jpg') ?>"></a>
                                    <h4><a href="<?= site_url('masjid/') . $data['id'] . '/' . $url ?>">Masjid <?= $data['name_resmi'] ?></a></h4>
                                    <span><?= $data['date_resmi'] ? date('d/m/Y', strtotime($data['date_resmi'])) : '-' ?></span>
                                    <!-- <p>
                                        <?= $data['lokasi'] ? $data['lokasi'] : '-' ?>
                                    </p> -->
                                    <div class="social">
                                        <a href="https://<?= $data['twitter'] ? $data['twitter'] : '#' ?>"><i class="bi bi-twitter"></i></a>
                                        <a href="https://<?= $data['facebook'] ? $data['facebook'] : '#' ?>"><i class="bi bi-facebook"></i></a>
                                        <a href="https://<?= $data['instagram'] ? $data['instagram'] : '#' ?>"><i class="bi bi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                </div>

            </div>
            <button type="button" class="btn btn-success" id="loadMore">Muat lainnya</button>
        </section><!-- End Why Us Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3><?= get_setting('nama_website') ?></h3>
            <!-- <p><?= get_setting('alamat') ?></p> -->
            <div class="social-links">
                <a href="https://<?= get_setting('youtube') ?>" class="youtube"><i class="bx bxl-youtube"></i></a>
                <a href="https://<?= get_setting('facebook') ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://<?= get_setting('instagram') ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span><?= date('Y') . ' ' . get_setting('nama_website') ?></span></strong>. All Rights Reserved
            </div>
            <!-- <div class="credits">
                Developer by <a target="_blank" href="https://sandemoindoteknologi.co.id/">Sandemo Indo Teknologi</a>
            </div> -->
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/frontend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/frontend/') ?>js/main.js"></script>

</body>

</html>