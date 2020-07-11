<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <?php foreach ($surat as $s) : ?>
                <form action="<?= base_url('persuratan/update'); ?>" method="post">
                    <div class="card card-success" style="margin-top: auto;">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title; ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Jenis Surat</label>
                                            <!-- ketika edit harus membawa id -->
                                            <input type="hidden" class="form-control" name="id" value="<?= $s->id ?>">
                                            <input type="text" class="form-control" name="jenis_surat" value="<?= $s->jenis_surat ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Nomor</label>
                                            <input type="text" class="form-control" name="nomor" value="<?= $s->nomor ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tgl</label>
                                            <input type="date" class="form-control" name="tgl" value="<?= $s->tgl ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Hal</label>
                                            <input type="text" class="form-control" name="hal" value="<?= $s->hal ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Asal</label>
                                            <input type="text" class="form-control" name="asal" value="<?= $s->asal ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Waktu Rekam</label>
                                            <input type="time" class="form-control" name="waktu_rekam" value="<?= $s->waktu_rekam ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Nama Rekam</label>
                                            <input type="text" class="form-control" name="nama_rekam" value="<?= $s->nama_rekam ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>NIP Rekam</label>
                                            <input type="text" class="form-control" name="nip_rekam" value="<?= $s->nip_rekam ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                        </div>
                    </div>
        </div>
        </form>
    <?php endforeach; ?>