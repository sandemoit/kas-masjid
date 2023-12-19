<div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-lg-6 mb-5">
                <div class="card">
                    <?php echo form_open_multipart('admin/setting'); ?>
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit <?= $title ?></p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Save Changes</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <p class="text-uppercase text-sm">Website Information</p>
                        <input class="form-control" name="id_setting" type="hidden" value="<?= $setting['id_setting']; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Website</label>
                                    <input class="form-control" name="nama_website" id="nama_website" type="text" value="<?= $setting['nama_website']; ?>">
                                    <?= form_error('nama_website', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input class="form-control" name="email" id="email" type="text" value="<?= $setting['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Whatsapp</label>
                                    <input class="form-control" name="whatsapp" id="whatsapp" type="text" value="<?= $setting['whatsapp']; ?>">
                                    <?= form_error('whatsapp', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Facebook</label>
                                    <input class="form-control" name="facebook" id="facebook" type="text" value="<?= $setting['facebook']; ?>">
                                    <?= form_error('facebook', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Tentang Kami</label>
                                    <textarea name="about" class="form-control" cols="30"><?= $setting['about']; ?></textarea>
                                    <?= form_error('about', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30"><?= $setting['alamat']; ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger" pl-3>', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="custom-file-label col-sm-2">Picture</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/logo/') . $setting['logo_website']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" id="logo_website" name="logo_website" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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