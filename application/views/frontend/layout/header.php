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
    <link href="<?= base_url('assets/frontend/') ?>css/custom.css" rel="stylesheet">
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
                    <li><a class="nav-link scrollto active" href="<?= site_url('#hero') ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('#about') ?>">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('#data-masjid') ?>">Data Masjid</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('#jadwal') ?>">Jadwal Sholat</a></li>
                    <li><a class="getstarted scrollto" href="<?= site_url('login') ?>">Login/Daftar</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2><?= $masjid['name_resmi'] ?></h2>
                    <ol>
                        <li><a href="<?= site_url('/') ?>">Home</a></li>
                        <li><?= $masjid['name_resmi'] ?></li>
                    </ol>
                </div>

            </div>
        </section>