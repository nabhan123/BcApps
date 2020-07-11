<body class="hold-transition register-page" style="background-color: lemonchiffon;">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url() ?>assets/admin/index2.html"><b>PKC</b><sup>apps</sup></a>
        </div>
        <div class="card-body register-card-body" style="background-color: khaki; border-radius: 9%;">
            <p class="login-box-msg" style="font-family:sans-serif ;">Register a new membership</p>
            <!-- kita kembalikan ke halaman registrasi -->
            <form class="user" method="post" action="<?= base_url('auth/registrasi') ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="<?= set_value('name') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-fw fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
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
                        <a href="<?= base_url('auth') ?>" class="text-center ml-2">Back to Login</a>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                </div>

            </form>
        </div>
    </div><!-- /.card -->
    </div>

</body>

</html>