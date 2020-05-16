<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-houzz"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RUTAN <sup>Pontianak</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY -->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT  `user_menu`.`id`, `menu`
                    FROM  `user_menu` JOIN `user_access_menu`
                    ON    `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY  `user_access_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>

    <!-- Nav Item - Dashboard -->

    <!-- Divider -->

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->

    <!-- Nav Item - Tables -->
    <div class="sidebar-heading">
        Intro
    </div>

    <li class="nav-item <?= $menu_aktif == 'Welcome' ? 'active' : null ?>">
        <a class="nav-link pb-0" href="<?= base_url('welcome') ?>">
            <i class="fas fa-door-open"></i>
            <span>Welcome</span></a>
    </li>
    <hr class="sidebar-divider mt-3">
    <!-- LOOPING MENU -->

    <?php foreach ($menu as $m) : ?>

        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->

        <?php
        $menuId = $m['id'];
        // $querySubMenu = "SELECT   *
        //                     FROM  `user_sub_menu` JOIN `user_menu`
        //                     ON    `user_sub_menu`.`menu_id` = `user_menu`.`id`
        //                     WHERE `user_sub_menu`.`menu_id` = $menuId
        //                     AND   `user_sub_menu`.`is_active` = 1
        //             ";

        $querySubMenu = "SELECT * FROM `user_sub_menu`
                        WHERE `menu_id` = $menuId
                        AND `is_active` = 1
                        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($menu_aktif == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']) ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>



        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->