<div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8  mb-lg-0 mb-5">
                <div class="card">

                    <form action="<?= site_url('user/management') ?>" method="post">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Site Management</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save Changes</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <p class="text-uppercase text-sm">Site Information</p>
                            <input class="form-control" name="id_detail" type="hidden" value="<?= $site['id_detail']; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Resmi Masjid</label>
                                        <input class="form-control" name="name_resmi" id="name_resmi" type="text" value="<?= $site['name_resmi']; ?>">
                                        <?= form_error('name_resmi', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal Diresmikan Masjid</label>
                                        <input class="form-control" name="date_resmi" id="date_resmi" type="date" value="<?= $site['date_resmi']; ?>">
                                        <?= form_error('date_resmi', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Lokasi</label>
                                        <input class="form-control" name="lokasi" id="lokasi" type="text" value="<?= $site['lokasi']; ?>">
                                        <?= form_error('lokasi', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Luas Bangunan</label>
                                        <input class="form-control" name="luas_bangunan" id="luas_bangunan" type="text" value="<?= $site['luas_bangunan']; ?>">
                                        <?= form_error('luas_bangunan', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Luas Keseluruhan</label>
                                        <input class="form-control" name="luas_keseluruhan" id="luas_keseluruhan" type="text" value="<?= $site['luas_keseluruhan']; ?>">
                                        <?= form_error('luas_keseluruhan', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Daya Tampung Jamaah</label>
                                        <input class="form-control" name="daya_tampung" id="daya_tampung" type="text" value="<?= $site['daya_tampung']; ?>">
                                        <?= form_error('daya_tampung', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>