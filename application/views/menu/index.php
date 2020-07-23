<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:0;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal">Add New Menu
                            <i class="fas fa-fw fa-plus"></i>
                        </a>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- Content Wrapper. Contains page content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">

                                    </div>

                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Menu</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($menu as $m) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $m['menu']; ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>

                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
        </div>

        <!-- modal -->
        <!-- Modal -->
        <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu'); ?>" method="post">
                        <div class="modal-body">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Menu</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="form-group">
                                    <form class="form-horizontal">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name..">
                                                </div>

                                            </div>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>