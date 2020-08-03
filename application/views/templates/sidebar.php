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
                 <a href="<?= base_url('user') ?>" class="d-block"><?= $user['name'] ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- melakukan query menu -->
                 <?php
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id`,`menu`
              FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`. `id` = `user_access_menu`.`menu_id`
             WHERE `user_access_menu`.`role_id` = $role_id
             ORDER BY `user_access_menu` . `menu_id` ASC
             ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>
                 <!-- looping menu -->
                 <li class="nav-item">
                     <?php foreach ($menu as $m) : ?>
                         <div class="sidebar-heading" style="color:grey; margin-left:10%;">
                             <?= $m['menu']; ?>
                         </div>

                         <!-- query sub-menu -->
                         <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT * 
          FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`. `menu_id` = `user_menu`.`id`
         WHERE `user_sub_menu`.`menu_id` = $menuId
        AND `user_sub_menu`.`is_active` = 1
         ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>

                         <!-- looping submenu -->
                         <?php foreach ($subMenu as $sm) : ?>
                             <?php if ($title == $sm['title']) : ?>
                                 <ul class="nav-item" style="padding-left: 5%; color: goldenrod;">
                                 <?php else : ?>
                                     <a class="nav-link" href="<?= base_url($sm['url']); ?>" style="color:whitesmoke;">
                                     <?php endif; ?>
                                     <i class="<?= $sm['icon']; ?>"></i>
                                     <span><?= $sm['title']; ?>
                                     </span>
                                     </a>
                                 </ul>
                             <?php endforeach; ?>
                             <hr class="sidebar-divider mt-3" style="color: aliceblue;">
                         <?php endforeach; ?>
                 </li>
                 </li>

                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>