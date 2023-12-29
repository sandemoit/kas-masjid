<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Data Kegiatan</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#newkegiatanmodal">+&nbsp; New Kegiatan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger text-white" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th class="text-center">Nama Kegiatan</th>
                                    <th class="text-center">Tanggal Keigatan</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kegiatan as $key) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $key['name_kegiatan']; ?></td>
                                        <td class="text-center"><?= $key['date_kegiatan']; ?></td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-warning btn-icon-split" data-bs-toggle="modal" data-bs-target="#editmodal<?= $key['id_kegiatan'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#hapusmodal<?= $key['id_kegiatan'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Modal Add -->
        <div class="modal fade" id="newkegiatanmodal" tabindex="-1" role="dialog" aria-labelledby="newkegiatanmodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newkegiatanmodal">Tambah kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open_multipart('user/kegiatan'); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $user['id'] ?>" name="id_user">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name_kegiatan" name="name_kegiatan" placeholder="Nama kegiatan">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="date_kegiatan" name="date_kegiatan" placeholder="Tanggal kegiatan">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" id="image_kegiatan" name="image_kegiatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal edit -->
        <?php foreach ($kegiatan as $d) : ?>
            <div class="modal fade" id="editmodal<?= $d['id_kegiatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editmodal<?= $d['id_kegiatan'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editmodal<?= $d['id_kegiatan'] ?>">Edit Role Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('transaksi/updatekegiatan') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama'] ?>" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= $d['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-info">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- modal hapus -->
        <?php foreach ($kegiatan as $d) : ?>
            <div class="modal fade" id="hapusmodal<?= $d['id_kegiatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusmodal<?= $d['id_kegiatan'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusmodal<?= $d['id_kegiatan'] ?>">Sure on Delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">Menghapus Data Donatur : <b><?= $d['name_kegiatan']; ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn bg-gradient-danger" href="<?= base_url('user/deletekegitan/') . $d['id_kegiatan']; ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>