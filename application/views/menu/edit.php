<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <?php foreach ($submenu as $sm) : ?>
                <form action="<?= base_url('menu/update'); ?>" method="post">
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
                                            <label>Title</label>
                                            <!-- ketika edit harus membawa id -->
                                            <input type="hidden" class="form-control" name="id" value="<?= $sm->id ?>">
                                            <input type="text" class="form-control" name="jenis_surat" value="<?= $sm->title ?>">
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Menu</label>
                                            <input type="text" class="form-control" name="menu" value="<?= $sm->menu ?>">
                                        </div>
                                    </div> -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Url</label>
                                            <input type="text" class="form-control" name="url" value="<?= $sm->url ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type="text" class="form-control" name="icon" value="<?= $sm->icon ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Is Active</label>
                                            <input type="text" class="form-control" name="asal" value="<?= $sm->is_active ?>">
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