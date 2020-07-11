<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- SEARCH FORM -->
    <!-- <li> -->
    <?php
    date_default_timezone_set("Asia/Jakarta");
    $b = time();
    $hour = date("G", $b);
    if ($hour >= 0 && $hour <= 11) {
        echo "<h5>Selamat Pagi...</h5>";
    } elseif ($hour >= 12 && $hour <= 14) {
        echo "<h5>Selamat Siang...</h5>";
    } elseif ($hour >= 15 && $hour <= 17) {
        echo "<h5>Selamat Sore...</h5>";
    } elseif ($hour >= 17 && $hour <= 18) {
        echo "<h5>Selamat Petang...</h5>";
    } elseif ($hour >= 19 && $hour <= 23) {
        echo "<h5>Selamat Malam...</h5>";
    }
    ?>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/admin/dist/img/Profile/') . $user['image']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $user['name'] ?></span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="<?= base_url('assets/admin/dist/img/Profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
                    <p>
                        <?= $user['name'] ?>
                        <!-- <small>Member since <?= date('d F Y', $user['date_created']); ?></small> -->
                    </p>
                    <b style="margin-left: 6%;">Join at <?= date('d F Y', $user['date_created']); ?></b>
                </li>
                <li class="user-footer">

                <li class="nav-item mt-2 mb-2 pl-2">
                    <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Logout
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <!-- <span>Logout</span></a> -->
                    </a>
                </li>

            </ul>
</nav>
<!-- /.navbar -->