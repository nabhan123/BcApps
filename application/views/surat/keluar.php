<div class="content-wrapper">
    <div class="content-header">
        <?= $this->session->flashdata('message'); ?>

        <div class="content-fluid">
            <div class="btn-group mb-2">

                <div class="col-sm">
                    <button class="btn btn-sm btn-primary pt-2 pb-2" data-toggle="modal" data-target="#keluarsurat"><i class="fas fa-plus fa-sm "></i>Tambah Surat keluar</button>
                </div>
            </div>
            <div class="form-group mt-3">

                <table class="table table-bordered">
                    <tr style="background-color:gainsboro;">
                        <th>#</th>
                        <th>Jenis Surat</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Hal</th>
                        <th>Kepada</th>
                        <th>Waktu Rekam</th>
                        <th>Nama Rekam</th>
                        <th>NIP Rekam</th>
                        <th>Status</th>
                        <th colspan="4" style="text-align:center;">AKSI</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($surat_k as $sk) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $sk->jenis_surat_k; ?></td>
                            <td><?= $sk->no_surat_k; ?></td>
                            <td><?= $sk->tgl_surat_k; ?></td>
                            <td><?= $sk->hal_surat_k; ?></td>
                            <td><?= $sk->kepada; ?></td>
                            <td><?= $sk->waktu_rekam; ?></td>
                            <td><?= $sk->nama_rekam; ?></td>
                            <td><?= $sk->nip_rekam; ?></td>
                            <td><?= $sk->status; ?></td>
                            <td><?= anchor('admin/edit_k/' . $sk->id, '<div class="btn btn-info btn-sm ml-2"><i class="nav-icon fas fa-fw fa-edit"></i></div>
                       '); ?></td>

                            <td><?= anchor('admin/hapus_k/' . $sk->id, ' <div class="btn btn-danger btn-sm ml-2"><i class="fas fa-fw fa-trash"></i></div>'); ?>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="keluarsurat" tabindex="-1" role="dialog" aria-labelledby="keluarsuratLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-success" id="keluarsuratLabel">FORM SURAT KELUAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_keluarsurat'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Jenis Surat</label>
                                        <select class="form-control" id="jenis_surat_k" name="jenis_surat_k">
                                            <?php foreach ($jenis_k as $jk) : ?>
                                                <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Nomor</label>
                                        <input type="text" class="form-control" id="no_surat_k" name="no_surat_k">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Tgl</label>
                                        <input type="date" class="form-control" id="tgl_surat_k" name="tgl_surat_k">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Hal</label>
                                        <input type="text" name="hal_surat_k" id="hal_surat_k" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Kepada</label>
                                        <input type="text" name="kepada" id="kepada" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Waktu Rekam</label><br>
                                        <input type="time" name="waktu_rekam" id="waktu_rekam" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nama Rekam</label><br>
                                        <input type="text" name="nama_rekam" id="nama_rekam" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" form-group">
                                        <label for="">NIP Rekam</label><br>
                                        <input type="text" name="nip_rekam" id="nip_rekam" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4" style="margin-top: 4%;">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input-k" id="file" name="file">
                                        <label class="custom-file-label-k" for="file">Choose file</label>
                                    </div>
                                </div> -->
                                <div class="col-sm-4">
                                    <div class=" form-group">
                                        <label for="">Status</label><br>
                                        <input type="text" name="status" id="status" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                </form>
            </div>
            <!-- End of Main Content -->
        </div>
    </div>
    <!-- Begin Page Content -->