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
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#data-masjid">Data Masjid</a></li>
                    <li><a class="nav-link scrollto" href="#jadwal">Jadwal Sholat</a></li>
                    <li><a class="getstarted scrollto" href="<?= site_url('login') ?>">Login/Daftar</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(<?= base_url('assets/frontend/') ?>img/slide/slide-1.webp)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Assalamualaikum</h2>
                            <p class="animate__animated animate__fadeInUp"><?= get_setting('about') ?></p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(<?= base_url('assets/frontend/') ?>img/slide/slide-2.webp)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Multiplatform</h2>
                            <p class="animate__animated animate__fadeInUp">Mudahnya mengelola keuangan masjid dengan multiplatform memberikan kemudahan bagi pengurus untuk memantau dan mengelola dana masjid dengan praktis dari berbagai perangkat, memastikan transparansi dan efisiensi dalam pengelolaan keuangan yang berkualitas.</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(<?= base_url('assets/frontend/') ?>img/slide/slide-3.webp)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Mudah Digunakan</h2>
                            <p class="animate__animated animate__fadeInUp">Aplikasi keuangan masjid yang user-friendly memberikan pengalaman pengguna yang mudah dan intuitif. Dengan antarmuka yang ramah pengguna, pengurus masjid dapat dengan nyaman menjalankan fungsi keuangan, membuat pelaporan, dan mengelola keuangan masjid secara efisien tanpa hambatan.</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services section-bg">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-infinity"></i></div>
                            <h4 class="title"><a href="">Pantau Keuangan Tanpa Batas</a></h4>
                            <p class="description">Aplikasi ini memungkinkan pengurus masjid untuk dengan mudah memantau dan mengelola keuangan secara real-time dari mana saja dan kapan saja melalui website yang responsif.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-shield-check"></i></div>
                            <h4 class="title"><a href="">Sederhana, Tapi Kuat</a></h4>
                            <p class="description">Dengan antarmuka yang sederhana namun kuat, aplikasi keuangan masjid ini didesain agar mudah digunakan oleh semua anggota pengurus, bahkan yang tidak memiliki pengalaman teknis khusus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-person-check"></i></div>
                            <h4 class="title"><a href="">Laporan Cepat, Keputusan Tepat</a></h4>
                            <p class="description">Akses laporan keuangan yang lengkap dan cepat membantu pengurus masjid membuat keputusan yang tepat dalam pengelolaan dana, menjadikan aplikasi ini sebagai alat yang tak tergantikan.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About Us</h2>
                    <p><?php echo get_setting('about') ?></p>
                </div>

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="<?= base_url('assets/frontend/') ?>img/app.webp" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>Tentang Aplikasi Keuangan Masjid/Musala: "Sewajarnya Unggul"</h3>
                        <p>
                            Selamat datang di Aplikasi Keuangan Masjid, solusi canggih yang diciptakan untuk memudahkan pengurus masjid dalam mengelola keuangan dengan segala kemudahan di ujung jari. Dengan penuh dedikasi, kami menghadirkan berbagai keunggulan yang membedakan aplikasi ini dari yang lain.
                        </p>
                        <p class="fst-italic">
                            Aplikasi ini diciptakan dengan fokus pada kesederhanaan. Meskipun begitu, kekuatannya tidak boleh dianggap remeh. Antarmuka yang intuitif memastikan penggunaan yang mudah, memungkinkan siapa pun, tanpa terkecuali, untuk mengelola keuangan masjid tanpa kerumitan.
                        </p>
                        <p class="fst-italic">
                            Menyadari kebutuhan akan fleksibilitas, aplikasi ini dapat diakses dari berbagai perangkat. Dengan begitu, pengurus masjid dapat mengelola keuangan dengan mudah di mana saja dan kapan saja, tanpa kekhawatiran akan kendala teknis.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Masjid yang Terdaftar ======= -->
        <section id="data-masjid" class="team section-bg text-center">
            <div class="container">

                <div class="section-title">
                    <h2>Masjid/Musala</h2>
                    <p>Kami bangga melihat berbagai Masjid dan Musala yang telah sukses mengadopsi Aplikasi Keuangan kami dalam pengelolaan keuangan mereka. Bersama-sama, kami membentuk jejak keberhasilan, membuktikan bahwa solusi ini tidak hanya menguntungkan tetapi juga diakui oleh beragam komunitas keagamaan.</p>
                </div>

                <div class="row">
                    <?php foreach ($masjid as $data) : ?>
                        <?php if ($data['name_resmi'] !== null && $data['date_resmi'] !== null && $data['lokasi'] !== null) : ?>
                            <?php $url = url_title($data['name_resmi'], '-', TRUE); ?>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <a href="<?= site_url('masjid/') . $data['id'] . '/' . $url ?>"><img src="<?= base_url('assets/img/profile/') . ($data['image'] ? $data['image'] : 'default.jpg') ?>"></a>
                                    <h4><a href="<?= site_url('masjid/') . $data['id'] . '/' . $url ?>">Masjid <?= $data['name_resmi'] ?></a></h4>
                                    <span><?= $data['date_resmi'] ? date('d/m/Y', strtotime($data['date_resmi'])) : '-' ?></span>
                                    <p>
                                        <?= $data['lokasi'] ? $data['lokasi'] : '-' ?>
                                    </p>
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
            <button type="button" class="btn btn-success">Muat lainnya</button>
        </section><!-- End Why Us Section -->

        <!-- ======= Our Clients Section ======= -->

        <!-- ======= Services Section ======= -->

        <!-- ======= Cta Section ======= -->

        <!-- ======= Portfolio Section ======= -->

        <!-- ======= Jadwal Sholat ======= -->
        <section id="jadwal" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>Jadwal Sholat</h2>
                </div>

                <div class="row">
                    <iframe id="iframe" title="prayerWidget" class="widget-m-top" style=" height: 358px; border: 1px solid #ddd;" scrolling="no" src="https://www.islamicfinder.org/prayer-widget/1642911/shafi/11/0/20.0/18.0"> </iframe>
                </div>

            </div>
        </section>

        <!-- ======= Contact Section ======= -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3><?= get_setting('nama_website') ?></h3>
            <p><?= get_setting('alamat') ?></p>
            <div class="social-links">
                <a href="https://<?= get_setting('youtube') ?>" class="youtube"><i class="bx bxl-youtube"></i></a>
                <a href="https://<?= get_setting('facebook') ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://<?= get_setting('instagram') ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span><?= date('Y') . ' ' . get_setting('nama_website') ?></span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Developer by <a target="_blank" href="https://sandemoindoteknologi.co.id/">Sandemo Indo Teknologi</a>
            </div>
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