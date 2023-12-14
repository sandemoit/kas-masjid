<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Halaman Pendaftaran</h1>
                    <p class="text-lead text-white">Silahkan Membuat akun secara gratis tidak dipungut biaya.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Daftar</h5>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?php echo site_url('auth/registration') ?>" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nama Pengguna" id="name" name="name" value="<?= set_value('name') ?>">
                                <?= form_error('name', '<small class="text-danger" pl-3>', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger" pl-3>', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                                <?= form_error('password1', '<small class="text-danger" pl-3>', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Konfirmasi Password" id="password2" name="password2">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Sudah punya akun masjid? <a href="<?php echo site_url('auth/index') ?>" class="text-dark font-weight-bolder">Login!</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    Copyright © <?= date('Y') ?> Build by Sandemo Indo Teknologi.
                </p>
            </div>
        </div>
    </div>
</footer>