 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="<?= base_url() ?>assets/admin/dist/img/bea-cukai.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">PKC<sup>apps</sup></span>
     </a>
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url('assets/admin/dist/img/Profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= $user['name'] ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link ">
                         <i class="nav-icon fas fa-fw fa-envelope"></i>
                         <p>
                             Persuratan
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item" style="padding-left: 5%;">
                             <a href="<?= base_url('persuratan') ?>" class="nav-link">
                                 <i class="fas fa-fw fa-envelope-square"></i>
                                 <p>Surat Masuk</p>
                             </a>
                         </li>
                         <li class="nav-item" style="padding-left: 5%;">
                             <a href="<?= base_url('persuratan/surat_k') ?>" class="nav-link">
                                 <i class="fas fa-fw fa-envelope-open"></i>
                                 <p>Surat Keluar</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-fw fa-hourglass"></i>
                         <p>
                             Layanan PKC
                             <i class="fas fa-angle-left right"></i>
                             <span class="badge badge-info right">6</span>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/layout/top-nav.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Top Navigation</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Top Navigation + Sidebar</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-fw fa-tags"></i>
                         <p>
                             Layanan Lainnya
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/charts/chartjs.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>ChartJS</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-fw fa-archive"></i>
                         <p>
                             Arsip PKC
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/UI/general.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>General</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-header" style="padding-right: 20%;">Profile</li>
                 <li class="nav-item">
                     <a href="<?= base_url('user') ?>" class="nav-link">
                         <i class="nav-icon fas fa-fw fa-user"></i>
                         <p>
                             My Profile
                             <span class="badge badge-info right">2</span>
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                         <i class=" nav-icon fas fa-fw fa-sign-out-alt"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>

             </ul>
             </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>