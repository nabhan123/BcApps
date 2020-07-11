<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" style="margin-left: auto;">
                    <ol class="breadcrumb float-sm-right">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#keluar">Surat Keluar
                            <i class="fas fa-fw fa-plus"></i>
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card card-warning" style="margin-top: auto;">
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
                                <label>Tanggal Rekam Awal</label>
                                <input type="date" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Rekam Akhir</label>
                                <input type="date" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Petugas Penerima </label>
                                <select class="custom-select">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <button type="button" class="btn btn-warning ml-3 mt-4 " data-dismiss="modal">
                                    <i class="fas fa-fw fa-search"></i>Search</button>

                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- Modal -->

<div class="modal fade" id="keluar" tabindex="-1" role="dialog" aria-labelledby="keluarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: goldenrod;">
                <h5 class="modal-title" id="keluarLabel">Tambah Surat Keluar</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tanggal Rekam Awal</label>
                            <input type="date" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tanggal Rekam Akhir</label>
                            <input type="date" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <select class="custom-select">
                                <option>option 1</option>
                                <option>option 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Petugas Penerima</label>
                            <select class="custom-select">
                                <option>option 1</option>
                                <option>option 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select">
                                <option>option 1</option>
                                <option>option 2</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i>Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>