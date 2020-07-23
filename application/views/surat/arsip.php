<div class="content-wrapper">
    <div class="content-header">
        <?= $this->session->flashdata('message'); ?>
        <div class="btn-group mb-2">

        </div>
        <div class="btn-group mb-2">
            <button class="btn btn-sm btn-primary pt-2 pb-2" data-toggle="modal" data-target="#masuk"><i class="fas fa-plus fa-sm "></i>Tambah Arsip</button>
        </div>
        <div class="btn-group">
            <div class="col-md">
                <form class="form-inline" action="<?= base_url('admin'); ?>" method="post">
                    <div class="input-group mb-2">

                        <input type="text" class="form-control form-control-navbar" placeholder="Search by Jenis surat.." name="search" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit">
                            </input>
                        </div>
                    </div>
                </form>
                </section>
            </div>
        </div>

        <table class="table table-bordered">

            <tr style="background-color:gainsboro;">
                <th>#</th>
                <th>Nama Arsip</th>
                <th>Nomor</th>
                <th>Tgl</th>
                <th>Hal</th>
                <th>Asal</th>
                <th>Waktu Rekam</th>
                <th>Nama Rekam</th>
                <th>NIP Rekam</th>
                <th>Status</th>
                <th colspan="4" style="text-align:center;">AKSI</th>
            </tr>
            <!-- jika data yang dicari tidak ada -->
            <?php if (empty($masuk)) : ?>
                <tr>
                    <td colspan="12">
                        <div class="alert alert-danger" role="alert">
                            Data not found!
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            <?php
            $no = 1;
            foreach ($masuk as $m) : ?>
                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $m['jenis_surat']; ?></td>
                    <td><?= $m['nomor']; ?></td>
                    <td><?= $m['tgl']; ?></td>
                    <td><?= $m['hal']; ?></td>
                    <td><?= $m['asal']; ?></td>
                    <td><?= $m['waktu_rekam']; ?></td>
                    <td><?= $m['nama_rekam']; ?></td>
                    <td><?= $m['nip_rekam']; ?></td>
                    <td><?= $m['status']; ?></td>

                    <td><?= anchor('admin/edit/' . $m['id'], '<div class="btn btn-info btn-sm ml-2"><i class="nav-icon fas fa-fw fa-edit"></i></div>
                       '); ?></td>

                    <td><?= anchor('admin/hapus/' . $m['id'], ' <div class="btn btn-danger btn-sm ml-2"><i class="fas fa-fw fa-trash"></i></div>'); ?>

                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
        <?= $this->pagination->create_links(); ?>

        <!-- Modal -->
        <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="masukLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title-success" id="masukLabel">FORM INPUT PRODUK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/tambah_aksi'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Jenis Surat</label>
                                <select class="form-control" id="jenis_surat" name="jenis_surat">
                                    <?php foreach ($jenis as $j) : ?>
                                        <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-group">
                                    <label for="">Nomor</label>
                                    <input type="text" class="form-control" id="nomor" name="nomor">
                                </div>
                                <div class="form-group">
                                    <label for="">Tgl</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl">
                                </div>
                                <div class="form-group">
                                    <label for="">Hal</label>
                                    <input type="text" name="hal" id="hal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Asal</label>
                                    <input type="text" name="asal" id="asal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Waktu Rekam</label><br>
                                    <input type="time" name="waktu_rekam" id="waktu_rekam" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Rekam</label><br>
                                    <input type="text" name="nama_rekam" id="nama_rekam" class="form-control"> </div>
                                <div class=" form-group">
                                    <label for="">NIP Rekam</label><br>
                                    <input type="text" name="nip_rekam" id="nip_rekam" class="form-control">
                                </div>
                                <div class=" form-group">
                                    <label for="">Status</label><br>
                                    <input type="text" name="status" id="status" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
</div>
<!-- Begin Page Content -->