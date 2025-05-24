        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="box-shadow: 0 0 15px 0;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="./home.php"><?php echo $_SESSION['store_name'];?></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav d-md-inline-block form-inline ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#setting-modal">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#logout-modal"><span class="fa fa-sign-out-alt fa-fw"></span>&nbsp;Sign out</a></li>
                    </ul>
                </li>
            </ul>
            <small class="d-md-inline-block me-3 my-2"style="color:darkgrey"><?php //echo strtoupper($_SESSION['user_details']['position']); ?></small>
        </nav>

        <?php 
            include 'sidebar.php';
            require 'settings.php';
            require 'modals/logout-modal.php';
        ?>