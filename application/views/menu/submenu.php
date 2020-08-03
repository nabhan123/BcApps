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
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu
                            <i class="fas fa-fw fa-plus"></i>
                        </a>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- Content Wrapper. Contains page content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
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
                                                    <th>Title</th>
                                                    <th>Menu</th>
                                                    <th>Url</th>
                                                    <th>Icon</th>
                                                    <th>Active</th>
                                                    <th style="padding-left:7%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($submenu as $sm) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $sm['title']; ?></td>
                                                        <td><?= $sm['menu']; ?></td>
                                                        <td><?= $sm['url']; ?></td>
                                                        <td><?= $sm['icon']; ?></td>
                                                        <td><?= $sm['is_active']; ?></td>
                                                        <td><?= anchor('menu/editSubmenu/' . $sm['id'], '<div class="btn btn-info btn-sm ml-2"><i class="nav-icon fas fa-fw fa-edit"></i></div>
                                                        '); ?></td>
                                                         <td><?= anchor('menu/hapus/' . $sm['id'], ' <div class="btn btn-danger btn-sm ml-2"><i class="fas fa-fw fa-trash"></i></div>'); ?>
                                                       

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

                            <!-- Modal tambah submenu -->
                            <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newSubMenuModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('menu/submenu'); ?>" method="post">
                                            <div class="modal-body">
                                                <!-- Horizontal Form -->
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Add New Submenu</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- form start -->
                                                    <div class="form-group">
                                                        <form class="form-horizontal">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <div class="col-sm">
                                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Menu name..">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <form class="form-horizontal">
                                                                <div class="card-body" style="padding-top: 0px;">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm">
                                                                            <select name="menu_id" id="menu_id" class="form-control">
                                                                                <option value="">Select Menu</option>
                                                                                <?php foreach ($menu as $m) : ?>
                                                                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?>
                                                                                    </option>
                                                                                <?php endforeach; ?>
                                                                            </select> </div>
                                                                    </div>
                                                                </div>
                                                                <form class="form-horizontal">
                                                                    <div class="card-body" style="padding-top: 0%;">
                                                                        <div class="form-group row">
                                                                            <div class="col-sm">
                                                                                <input type="text" class="form-control" id="url" name="url" placeholder="submenu url..">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <form class="form-horizontal">
                                                                        <div class="card-body" style="padding-top: 0%;">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm">
                                                                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="submenu icon..">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" value="1" type="checkbox" id="is_active" name="is_active" checked>
                                                                                <label class="form-check-label" for="is_active">Active?
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>
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
                </div>
                