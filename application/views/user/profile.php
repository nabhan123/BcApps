<div class="content-wrapper" style="margin-top: 0;">

    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3">
                    <?= $this->session->flashdata('message') ?>
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline" style="margin-top: auto;">
                        <div class="card-body box-profile">
                            <div class="">
                                <img src="<?= base_url('assets/admin/dist/img/Profile/') . $user['image']; ?>" class="card-img">
                            </div>
                            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>
                            <p class="text-muted text-center"><?= $user['nip']; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b style="margin-left: 10%;">Join at <?= date('d F Y', $user['date_created']); ?></b>
                                    <a class="float-right"></a>
                                </li>

                            </ul>

                            <div class="btn-group mb-2 pl-5">
                                <button class="btn btn-sm btn-primary pt-2 pb-2" data-toggle="modal" data-target="#profile"><i class="fas fa-fw fa-edit"></i>Edit Profile</button>
                            </div>
                            <div class="btn-group mb-2" style="padding-left: 17%;">
                                <button class="btn btn-sm btn-primary pt-2 pb-2" data-toggle="modal" data-target="#ubah"><i class="fas fa-fw fa-key" style="padding-left: 3%;"></i>Ubah Password</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- Modal Profile -->
                <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title-success" id="profileLabel">Form Edit Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Begin Page Content -->
                                <div class="container-fluid">
                                    <!-- Page Heading -->
                                    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
                                    <div class="row">
                                        <div class="col-lg">
                                            <?= form_open_multipart('user/edit'); ?>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>">
                                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Date Created</label>
                                                <div class="col-sm-10">
                                                    <input type="datetime" class="form-control" id="date_created" name="date_created" value="<?= date('d F Y', $user['date_created']); ?>" readonly>
                                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class=" form-group row">
                                                <div class="col-sm-2">Picture</div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <img src="<?= base_url('assets/admin/dist/img/Profile/') . $user['image']; ?>" class="img-thumbnail">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                                <label class="custom-file-label" for="image">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-end">

                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
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
                <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title-success" id="profileLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Begin Page Content -->
                                <div class="container-fluid">
                                    <!-- Page Heading -->
                                    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
                                    <div class="row">
                                        <div class="col-lg">
                                            <?= form_open_multipart('user/ubah_password'); ?>
                                            <div class="form-group row">
                                                <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="new_password1" class="col-sm-2 col-form-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="new_password2" class="col-sm-2 col-form-label">Repeat Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                                </div>
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
            <!-- end of modal profile -->