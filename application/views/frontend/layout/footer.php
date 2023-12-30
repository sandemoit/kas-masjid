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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var loadMoreButton = document.getElementById('loadMore');
        var masjidContainer = document.getElementById('masjidContainer');

        var shownDataCount = document.querySelectorAll('#masjidContainer .member').length;
        var dataPerPage = 8;

        function loadMoreData() {
            loadMoreButton.classList.add('loading'); // Tambahkan kelas loading untuk memulai animasi

            // Simulasikan penundaan untuk menunjukkan animasi loading (hapus ini di implementasi sebenarnya)
            setTimeout(function() {
                // Kirim permintaan AJAX untuk mendapatkan data tambahan
                // Gantilah URL dan tindakan ini sesuai dengan backend Anda
                $.ajax({
                    url: 'url_ke_backend_anda',
                    type: 'POST',
                    data: {
                        start: shownDataCount,
                        limit: dataPerPage
                    },
                    success: function(response) {
                        masjidContainer.innerHTML += response;
                        shownDataCount = document.querySelectorAll('#masjidContainer .member').length;
                        if (shownDataCount < totalData) {
                            loadMoreButton.style.display = 'none';
                        }
                    },
                    error: function() {
                        console.error('Gagal memuat data tambahan');
                    },
                    complete: function() {
                        loadMoreButton.classList.remove('loading'); // Hapus kelas loading setelah sukses atau gagal
                    }
                });
            }, 1000); // Hapus ini di implementasi sebenarnya, ini hanya simulasi
        }

        loadMoreButton.addEventListener('click', function() {
            loadMoreData();
        });
    });
</script>

</body>

</html>