    <body class="hold-transition login-page" style="background-color: lemonchiffon;">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>PKC</b><sup>apps</sup></a>

            </div>
            <!-- /.login-logo -->
            <!-- <div class="card mt-auto"> -->
            <div class="card-body mt-2">
                <div class="card-body register-card-body" style="background-color: khaki; border-radius: 9%;">
                    <p class=" login-box-msg">Login Page</p>
                    <?= $this->session->flashdata('message'); ?>
                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        <div class="row">
                            <div class="col-8">
                                <a href="<?= base_url('auth/registrasi') ?>" class="" style="margin-left: 2%; ;">Registrasi!</a>
                            </div>
                            <div class="col-8">
                                <a href="<?= base_url('auth/ubah_password') ?>" class="" style="margin-left: 2%;">Lupa Password?</a>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                    <!-- /.social-auth-links -->


                </div>
                <!-- /.login-card-body -->
            </div>

            <!-- /.login-box -->


    </body>

    </html>