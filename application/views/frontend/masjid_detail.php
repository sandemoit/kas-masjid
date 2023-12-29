<section class="portfolio portfolio-details">
    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="row">
                    <?php foreach ($kegiatan as $key) : ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="card__kegiatan">
                                <a href="<?= site_url('assets/frontend/img/kegiatan/') . $key['image_kegiatan'] ?>"><img src="<?= site_url('assets/frontend/img/kegiatan/') . $key['image_kegiatan'] ?>" alt="Event"></a>
                                <div class="card__detail">
                                    <h5><?= $key['name_kegiatan'] ?></h5>
                                    <p><?= date('d/m/Y', strtotime($key['date_kegiatan'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>Informasi Masjid</h3>
                    <ul>
                        <li><strong>Nama Resmi</strong>: <?= $masjid['name_resmi'] ?></li>
                        <li><strong>Tanggal Resmi</strong>: <?= $masjid['date_resmi'] ?></li>
                        <li><strong>Lokasi</strong>: <?= $masjid['lokasi'] ?></li>
                        <li><strong>Luas Bangunan</strong>: <?= $masjid['luas_bangunan'] ?></li>
                        <li><strong>Luas Keseluruhan</strong>: <?= $masjid['luas_keseluruhan'] ?></li>
                        <li><strong>Daya Tampung Jamaah</strong>: <?= $masjid['daya_tampung'] ?></li>
                    </ul>
                </div>
                <!-- <div class="portfolio-description">
                    <h2>This is an example of portfolio detail</h2>
                    <p>
                        Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                </div> -->
            </div>

        </div>

    </div>
</section>