<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <?php foreach ($surat_k as $sk) : ?>
                <form action="<?= base_url('admin/update_k'); ?>" method="post">
                    <div class="card card-success" style="margin-top: auto;">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title; ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Jenis Surat</label>
                                            <input type="hidden" class="form-control" name="id" value="<?= $sk->id ?>">
                                            <input type="text" class="form-control" name="jenis_surat_k" value="<?= $sk->jenis_surat_k ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Nomor</label>
                                            <input type="text" class="form-control" name="no_surat_k" value="<?= $sk->no_surat_k ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Tgl</label>
                                            <input type="date" class="form-control" name="tgl_surat_k" value="<?= $sk->tgl_surat_k ?>">
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Hal</label>
                                            <input type="text" name="hal_surat_k" class="form-control" value="<?= $sk->hal_surat_k ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Kepada</label>
                                            <input type="text" name="kepada" class="form-control" value="<?= $sk->kepada ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Waktu Rekam</label><br>
                                            <input type="time" name="waktu_rekam" class="form-control" value="<?= $sk->waktu_rekam ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Nama Rekam</label><br>
                                            <input type="text" name="nama_rekam" class="form-control" value="<?= $sk->nama_rekam ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" form-group">
                                            <label for="">NIP Rekam</label><br>
                                            <input type="text" name="nip_rekam" class="form-control" value="<?= $sk->nip_rekam ?>">
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
                                            <input type="text" name="status" class="form-control" value="<?= $sk->status ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>